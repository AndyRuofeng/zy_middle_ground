<?php
/**
 * Created by  ruofeng
 * Date: 2019-08-12
 * Time: 16:07
 */


namespace backend\controllers;


use backend\helper\HttpService;
use Yii;
use yii\web\Controller;

class AccountController extends Controller
{
    /*
     * 获取 access_token、refresh_token、advertiser_id
     */
    public function actionTokens()
    {
        $config = Yii::$app->params['douyin'];
        $app_id = $config['app_id'];
        $secret = $config['secret'];

        // 从数据库中取
        $auth_code = '8f2853f4502bd36dbb70bdcb2cafc44e67a870c6';
        $url = 'https://ad.toutiao.com/open_api/oauth2/access_token/';
        $params = [
            "app_id" => $app_id,
            "secret" => $secret,
            "grant_type" => "auth_code",
            "auth_code" => $auth_code
        ];

        $res = HttpService::getInstance()->post( $url,$params,[
            'Content-Type' => 'application/json'
        ]);
        echo json_encode($res);
    }

    private function _refresh_token()
    {
        $config = Yii::$app->params['douyin'];
        $app_id = $config['app_id'];
        $secret = $config['secret'];

        // 从数据库中取
        $refresh_token = 'd9307d055ab3f9db7da370ace5142c631b8eb687';
        $url = 'https://ad.toutiao.com/open_api/oauth2/refresh_token/';
        $params = [
            "app_id" => $app_id,
            "secret" => $secret,
            "grant_type" => "refresh_token",
            "refresh_token" => $refresh_token
        ];

        $res = HttpService::getInstance()->post( $url,$params);
        echo json_encode($res);
    }
}