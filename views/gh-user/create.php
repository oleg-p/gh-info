<?php

/* @var $this yii\web\View */
/* @var $model GhUser */

use app\models\GhUser;

$this->title = Yii::t('app', 'Создание GH пользователя');

$this->params['breadcrumbs'][] = ['label' => 'GH пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Создание Гитхаб пользователя</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
