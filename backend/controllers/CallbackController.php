<?php
/**
 * Created by  ruofeng
 * Date: 2019-08-09
 * Time: 09:42
 */


namespace backend\controllers;

use backend\models\DyAuthCode;
use yii\web\Controller;
use Yii;


class CallbackController extends Controller
{
    /*
     * 授权回调
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->getQueryParams();
        $auth_code = $params['auth_code'];
        $state = $params['state'];
        $state = base64_decode($state);
        parse_str($state,$arr);
        $account = $arr['account'];
        $channel_id = $arr['channel_id'];

        $auth_code_info = DyAuthCode::find()->where(['account' => $account])->asArray()->one();
        if(!empty($auth_code_info)){
            $auth_code_info['auth_code'] = $auth_code;
            DyAuthCode::updateAll(['auth_code' => $auth_code],['account' => $account]);
        }else{
            $data = [
                'account' => $account,
                'auth_code' => $auth_code,
                'channel_id' => $channel_id,
                'date_time' => date('Y-m-d: H:i:s')
            ];

            $table_name = DyAuthCode::tableName();
            Yii::$app->db->createCommand()->insert($table_name, $data)->execute();
            //$id=Yii::$app->db->getLastInsertID();
        }
    }
}