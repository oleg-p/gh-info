<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use GhInfo\Infrastructure\Http\YiiTransport;
use GhInfo\UserStory\Site\GetUsersRepositories\ArrayAvailable;
use GhInfo\UserStory\Site\GetUsersRepositories\IndexedUpdatedAndIdArray;
use GhInfo\UserStory\Site\GetUsersRepositories\LimitedArray;
use GhInfo\UserStory\Site\GetUsersRepositories\ListUsersLogin;
use GhInfo\UserStory\Site\GetUsersRepositories\SortedByKeyArray;
use GhInfo\UserStory\Site\GetUsersRepositories\UsersRepositoriesFromGithub;
use yii\data\ArrayDataProvider;
use yii\data\BaseDataProvider;
use yii\web\Controller;
use yii\httpclient\Client;

class StatisticsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => $this->dataProvider()
        ]);
    }

    private function dataProvider(): BaseDataProvider
    {
        return new ArrayDataProvider([
            'allModels' => $this->allModels()->value(),
        ]);
    }

    private function allModels(): ArrayAvailable
    {
        return
            new LimitedArray(
                new SortedByKeyArray(
                    new IndexedUpdatedAndIdArray(
                        new UsersRepositoriesFromGithub(
                            new ListUsersLogin(),
                            new YiiTransport(new Client()),
                            Yii::$app->cache,
                            5 * 60
                        )
                    )
                ),
                10
            );
    }
}