<?php
/**
 * Created by PhpStorm.
 * User: zhipeng-finlai
 * Date: 2018/1/22
 * Time: 下午1:21
 */

namespace backend\modules\third\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        echo 'Default Index';
        exit;
    }
}