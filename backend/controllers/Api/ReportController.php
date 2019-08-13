<?php
/**
 * Created by  ruofeng
 * Date: 2019-08-13
 * Time: 09:55
 */


namespace backend\controllers\api;


use backend\models\DyDataReport;
use Yii;
use yii\web\Controller;

class ReportController extends Controller
{
    public function actionIndex()
    {
        $params = Yii::$app->request->getQueryParams();
        $date = $params['date'] ?? '2019-08-01';    //date('Y-m-d');
        $channel_id = $params['channel_id'] ?? 0;   // 0:全部渠道 1：抖音  2：快手
        $agent_id = $params['agent_id'] ?? 0;       // 0:所有的代理商

        // 所有代理商
        if(0 == $agent_id){

            // 所有渠道
            if(0 == $channel_id){
                // 抖音
                $dy_data['date'] = $date;
                $dy_data['time'] = date('H:i:s');
                $dy_data['product'] = '章鱼输入法';
                $dy_data['channel_name'] = '抖音';
                $dy_data['channel_id'] = 1;
                $params = ['stat_datetime' => $date];
                $res = $this->get_dou_yin_data($params);
                $dy_data = array_merge($dy_data,$res);
                $dy_data['per_cost'] = number_format($dy_data['cost']/$dy_data['active'],2);
                $head[] = $dy_data;

                // 快手
                $ks_data['date'] = $date;
                $ks_data['time'] = date('H:i:s');
                $ks_data['product'] = '章鱼输入法';
                $ks_data['channel_name'] = '快手';
                $ks_data['channel_id'] = 2;
                $params = ['date' => $date];
                $res = $this->get_kuai_shou_data($params);
                $ks_data = array_merge($ks_data,$res);
                $ks_data['per_cost'] = number_format($ks_data['cost']/$ks_data['active'],2);
                $head[] = $ks_data;
            }else{
                switch ($channel_id){
                    case 1:
                        // 抖音
                        $dy_data['date'] = $date;
                        $dy_data['time'] = date('H:i:s');
                        $dy_data['product'] = '章鱼输入法';
                        $dy_data['channel_name'] = '抖音';
                        $dy_data['channel_id'] = 1;
                        $params = ['stat_datetime' => $date];
                        $res = $this->get_dou_yin_data($params);
                        $dy_data = array_merge($dy_data,$res);
                        $dy_data['per_cost'] = number_format($dy_data['cost']/$dy_data['active'],2);
                        $head[] = $dy_data;
                        break;

                    case 2:
                        // 快手
                        $ks_data['date'] = $date;
                        $ks_data['time'] = date('H:i:s');
                        $ks_data['product'] = '章鱼输入法';
                        $ks_data['channel_name'] = '快手';
                        $ks_data['channel_id'] = 2;
                        $params = ['date' => $date];
                        $res = $this->get_kuai_shou_data($params);
                        $ks_data = array_merge($ks_data,$res);
                        $ks_data['per_cost'] = number_format($ks_data['cost']/$ks_data['active'],2);
                        $head[] = $ks_data;
                        break;
                }
            }

        }else{

            // 根据 $agent_id 去获取 $ad_ids
            $ad_ids = [];
        }

        $data['head']['total_channel'] = count($head);
        /*$data['head']['total_cost'] = array_sum(array_column($head,'cost'));
        $data['head']['total_active'] = array_sum(array_column($head,'active'));
        $data['head']['per_cost'] = number_format($data['total_cost']/$data['total_active'], 2);
        $data['head']['list'] = $head;*/

        //$data['body_list'] = [];

        echo json_encode($data);
    }

    /*
     * 后去抖音数据
     */
    public function get_dou_yin_data(array $params)
    {
        $auth_code_info = DyDataReport::find()->where($params)->select(['cost','show','click','download_start','download_finish','active'])->asArray()->all();

        return $auth_code_info[0];
    }

    /*
     * 获取快手数据
     */
    public function get_kuai_shou_data(array $params)
    {
        return [
            "cost" => "60078.72",
            "show" => "2379085",
            "click" => "163142",
            "download_start" => "116913",
            "download_finish" => "84585",
            "active" => "21028"
        ];
    }


}