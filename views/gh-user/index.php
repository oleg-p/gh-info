<?php

/* @var $this yii\web\View */
/* @var $searchModel \app\models\searchies\GhUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::t('app', 'GH пользователи');
$this->params['breadcrumbs'][] = $this->title;

?>
<h1>Гитхаб пользователи</h1>

<p>
    <?= Html::a('Создать', ['create'], ['class' => 'btn btn-info']) ?>
</p>

<div class="gh-users">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'login',
            [
                'class' => ActionColumn::class,
                'template' => '{update} {delete}',
            ]
        ],
    ]) ?>
</div>
