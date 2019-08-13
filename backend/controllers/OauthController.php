<?php
/**
 * Created by  ruofeng
 * Date: 2019-08-08
 * Time: 18:17
 */


namespace backend\controllers;


use yii\web\Controller;
use Yii;

class OauthController extends Controller
{
    public function actionIndex()
    {
        $params = Yii::$app->request->getQueryParams();
        $params = json_encode($params);
        //file_put_contents("/tmp/ypf.txt",$params."\r\n",FILE_APPEND);
        var_dump($params);
    }
}