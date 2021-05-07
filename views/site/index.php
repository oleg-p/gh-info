<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'GitHub Info';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Github информация</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <h2>GitHub пользователи</h2>
                <p><a class="btn btn-default" href="<?= Url::to(['gh-user/index']) ?>">Работа с пользователями &raquo;</a>
                </p>
            </div>
            <div class="col-md-6">
                <h2>GitHub статистика</h2>
                <p><a class="btn btn-default" href="<?= Url::to(['statistics/index']) ?>">Просмотр статистики &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
