<?php
/**
 * Created by  ruofeng
 * Date: 2019-08-11
 * Time: 22:10
 */


namespace backend\controllers;


use backend\helper\HttpService;
use backend\models\DyDataReport;
use yii\web\Controller;
use Yii;

class ReportController  extends Controller
{
    /*
     * 获取广告主数据
     */
    public function actionAdvertiser()
    {
        // 数据库中取
        $advertiser_id = '1634042651435015';
        // 缓存中取
        $access_token = '3384498f0d45646f503014cb72b5e23a84197393';


        $date = date('Y-m-d ');
        $end_date = date("Y-m-d",strtotime("-1 day",strtotime($date)));
        $start_date = date("Y-m-d",strtotime("-14 day",strtotime($end_date)));

        $last_end_date = '2019-01-01';
        $id_arr = [];
        while ($start_date >= $last_end_date){
            $url = 'https://ad.toutiao.com/open_api/2/report/advertiser/get/';
            $params = [
                'advertiser_id' => $advertiser_id,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'time_granularity' => 'STAT_TIME_GRANULARITY_DAILY'
            ];
            $res = HttpService::getInstance()->get($url, $params, [
                'Access-Token' => $access_token,
                'Content-Type' => 'application/json'
            ]);

            $list = $res['data']['list'] ?? [];
            $list = array_column($list, null, 'stat_datetime');
            krsort($list);

            // 存到数据库中
            if(!empty($list)){
                $table_name = DyDataReport::tableName();
                foreach ($list as $value){
                    $value['type'] = 1; // 投放到枚举文件中
                    Yii::$app->db->createCommand()->insert($table_name, $value)->execute();

                    $id=Yii::$app->db->getLastInsertID();
                    $id_arr[] = $id;
                }
            }

            $end_date = $start_date;
            $start_date = date("Y-m-d",strtotime("-14 day",strtotime($end_date)));
        }

        echo json_encode($id_arr);
    }

    /*
     * 获取广告组数据
     */
    public function actionGroups()
    {
        // 数据库中取
        $advertiser_id = '1634042651435015';
        // 缓存中取
        $access_token = '3384498f0d45646f503014cb72b5e23a84197393';

        $start_date = '2019-08-01';
        $end_date = '2019-08-10';
        $url = 'https://ad.toutiao.com/open_api/2/report/campaign/get/';
        $params = [
            'advertiser_id' => $advertiser_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'page' => 1,
            'page_size' => 10
        ];

        $res = HttpService::getInstance()->get($url, $params, [
            'Access-Token' => $access_token,
            'Content-Type' => 'application/json'
        ]);

        // 存到数据库中
        echo json_encode($res);
    }

    /*
     * 获取广告计划
     */
    public function actionPlans()
    {
        // 数据库中取
        $advertiser_id = '1634042651435015';
        // 缓存中取
        $access_token = '3384498f0d45646f503014cb72b5e23a84197393';

        $start_date = '2019-08-01';
        $end_date = '2019-08-01';
        $url = 'https://ad.toutiao.com/open_api/2/report/ad/get/';
        $params = [
            'advertiser_id' => $advertiser_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'page' => 1,
            'page_size' => 10
        ];

        $res = HttpService::getInstance()->get($url, $params, [
            'Access-Token' => $access_token,
            'Content-Type' => 'application/json'
        ]);

        // 存到数据库中
        echo json_encode($res);
    }

    /*
     * 获取广告创意
     */
    public function actionCreativity()
    {
        // 数据库中取
        $advertiser_id = '1634042651435015';
        // 缓存中取
        $access_token = '3384498f0d45646f503014cb72b5e23a84197393';

        $start_date = '2019-08-01';
        $end_date = '2019-08-02';
        $url = 'https://ad.toutiao.com/open_api/2/report/creative/get/';
        $params = [
            'advertiser_id' => $advertiser_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'page' => 1,
            'page_size' => 10
        ];

        $res = HttpService::getInstance()->get($url, $params, [
            'Access-Token' => $access_token,
            'Content-Type' => 'application/json'
        ]);

        // 存到数据库中
        echo json_encode($res);
    }

    /*
     * 获取代理商数据
     */
    public function actionAgent()
    {
        
    }

    public function actionInfo()
    {
        // 数据库中取
        $advertiser_id = 1634042651435015;
        // 缓存中取
        $access_token = '931012a2a3dda27404d8e61e72bc3d7458a20b95';

        $url = 'https://ad.toutiao.com/open_api/2/advertiser/info/';
        $params = [
            'advertiser_ids' => [$advertiser_id],
            'fields' => ['status']
        ];


        $res = HttpService::getInstance()->get($url, $params, [
            'Access-Token' => $access_token,
            'Content-Type' => 'application/json'
        ]);

        // 存到数据库中
        echo json_encode($res);
    }
}