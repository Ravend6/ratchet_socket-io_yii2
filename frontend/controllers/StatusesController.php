<?php

namespace frontend\controllers;

use yii\web\Controller;

class StatusesController extends Controller
{
    public function actionIndex() 
    {
        return $this->render('index');
    }
}