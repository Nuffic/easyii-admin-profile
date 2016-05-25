<?php

namespace nuffic\profile\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\easyii\components\Controller;
use nuffic\profile\models\Admin;
use yii\web\NotFoundHttpException;

class AController extends Controller
{
    /** @var string  */
    public $moduleName = 'profile';

    public function actionIndex()
    {
        $admins = new ActiveDataProvider([
            'query' => Admin::find()
        ]);
        return $this->render('index', ['admins' => $admins]);
    }

    public function actionUpdate($id)
    {
        $admin = $this->findModel($id);
        if ($admin->load(Yii::$app->request->post()) && $admin->save()) {
            $this->flash('success', Yii::t('app', 'Profile updated'));
            $this->redirect(['update', 'id' => $id]);
        }
        return $this->render('update', ['admin' => $admin]);
    }

    /**
     * Finds the MenuItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('There\'s no such admin.');
        }
    }
}
