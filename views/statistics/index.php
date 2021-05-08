<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ArrayDataProvider */

use app\assets\ReloadPage;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::t('app', 'repos пользователей');
$this->params['breadcrumbs'][] = $this->title;

ReloadPage::register($this);

?>
<h1>Репозитории пользователей</h1>

<div class="gh-statistics">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name:text:Наименование',
            'owner.login:text:Пользователь',
            [
                'label' => 'url',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model['html_url'], $model['html_url'], ['class' => 'btn btn-link']);
                }
            ],
            'language:text:Язык',
            'description:ntext:Описание',
            'private:boolean:Приватный',
            'updated_at:datetime:Обновлён',
        ]
    ])
    ?>
</div>
