<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class HandlebarsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['bearer'],
                'rules' => [
                    [
                        'actions' => ['bearer'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // [
                    //     'actions' => ['logout'],
                    //     'allow' => true,
                    //     'roles' => ['@'],
                    // ],
                ],
            ],
        ];
    }

    public function actionIndex() 
    {
        return $this->render('index');
    }

    public function actionStatuses() 
    {
        return $this->render('statuses');
    }

    public function actionChat() 
    {
        return $this->render('chat');
    }

    public function actionBearer() 
    {
        return $this->render('bearer');
    }
}