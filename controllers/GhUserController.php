<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\GhUser;
use app\models\searchies\GhUserSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GhUserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new GhUserSearch();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $searchModel->search(),
        ]);
    }

    public function actionCreate()
    {
        $model = new GhUser();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Пользователь создан успешно');
                return $this->redirect(['index']);
            }
            return Yii::$app->session->setFlash('danger', 'Не удалось создать пользователя');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Пользователь сохранён успешно');
                return $this->redirect(['index']);
            }
            return Yii::$app->session->setFlash('danger', 'Не удалось сохранить пользователя');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->delete();

        Yii::$app->session->setFlash('success', 'Пользователь удалён');

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $model = GhUser::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        return $model;
    }
}