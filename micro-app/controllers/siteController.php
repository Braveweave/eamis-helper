<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller{
	public function actionIndex(){
		return "Hello World From micro-app";
	}
}