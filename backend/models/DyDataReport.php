<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dy_data_report".
 *
 * @property int $id
 * @property string $advertiser_id
 * @property int $type
 * @property int $comment
 * @property int $register
 * @property string $cost
 * @property int $show
 * @property string $convert_cost
 * @property int $share
 * @property int $click_install
 * @property string $next_day_open_rate
 * @property int $play_50_feed_break
 * @property int $vote
 * @property int $follow
 * @property int $message
 * @property int $click
 * @property int $ies_music_click
 * @property int $redirect
 * @property int $play_100_feed_break
 * @property string $interact_per_cost
 * @property int $lottery
 * @property int $play_75_feed_break
 * @property int $play_25_feed_break
 * @property int $valid_play
 * @property int $pay_count
 * @property int $download_finish
 * @property string $stat_datetime
 * @property int $in_app_uv
 * @property int $advanced_creative_counsel_click
 * @property int $in_app_cart
 * @property int $in_app_detail_uv
 * @property int $download_start
 * @property int $shopping
 * @property int $total_play
 * @property int $form
 * @property int $advanced_creative_phone_click
 * @property int $ies_challenge_click
 * @property int $wechat
 * @property int $consult
 * @property int $active
 * @property int $home_visited
 * @property int $qq
 * @property int $wifi_play
 * @property int $convert
 * @property int $like
 * @property int $phone
 * @property string $play_duration_sum
 * @property int $button
 * @property int $map_search
 * @property int $in_app_pay
 * @property int $in_app_order
 * @property string $next_day_open_cost
 * @property int $view
 * @property int $phone_confirm
 * @property int $advanced_creative_form_click
 * @property int $consult_effective
 * @property int $next_day_open
 * @property int $install_finish
 */
class DyDataReport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dy_data_report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advertiser_id', 'stat_datetime'], 'required'],
            [['type', 'comment', 'register', 'show', 'share', 'click_install', 'play_50_feed_break', 'vote', 'follow', 'message', 'click', 'ies_music_click', 'redirect', 'play_100_feed_break', 'lottery', 'play_75_feed_break', 'play_25_feed_break', 'valid_play', 'pay_count', 'download_finish', 'in_app_uv', 'advanced_creative_counsel_click', 'in_app_cart', 'in_app_detail_uv', 'download_start', 'shopping', 'total_play', 'form', 'advanced_creative_phone_click', 'ies_challenge_click', 'wechat', 'consult', 'active', 'home_visited', 'qq', 'wifi_play', 'convert', 'like', 'phone', 'play_duration_sum', 'button', 'map_search', 'in_app_pay', 'in_app_order', 'view', 'phone_confirm', 'advanced_creative_form_click', 'consult_effective', 'next_day_open', 'install_finish'], 'integer'],
            [['cost', 'convert_cost', 'next_day_open_rate', 'interact_per_cost', 'next_day_open_cost'], 'number'],
            [['stat_datetime'], 'safe'],
            [['advertiser_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'advertiser_id' => 'Advertiser ID',
            'type' => 'Type',
            'comment' => 'Comment',
            'register' => 'Register',
            'cost' => 'Cost',
            'show' => 'Show',
            'convert_cost' => 'Convert Cost',
            'share' => 'Share',
            'click_install' => 'Click Install',
            'next_day_open_rate' => 'Next Day Open Rate',
            'play_50_feed_break' => 'Play 50 Feed Break',
            'vote' => 'Vote',
            'follow' => 'Follow',
            'message' => 'Message',
            'click' => 'Click',
            'ies_music_click' => 'Ies Music Click',
            'redirect' => 'Redirect',
            'play_100_feed_break' => 'Play 100 Feed Break',
            'interact_per_cost' => 'Interact Per Cost',
            'lottery' => 'Lottery',
            'play_75_feed_break' => 'Play 75 Feed Break',
            'play_25_feed_break' => 'Play 25 Feed Break',
            'valid_play' => 'Valid Play',
            'pay_count' => 'Pay Count',
            'download_finish' => 'Download Finish',
            'stat_datetime' => 'Stat Datetime',
            'in_app_uv' => 'In App Uv',
            'advanced_creative_counsel_click' => 'Advanced Creative Counsel Click',
            'in_app_cart' => 'In App Cart',
            'in_app_detail_uv' => 'In App Detail Uv',
            'download_start' => 'Download Start',
            'shopping' => 'Shopping',
            'total_play' => 'Total Play',
            'form' => 'Form',
            'advanced_creative_phone_click' => 'Advanced Creative Phone Click',
            'ies_challenge_click' => 'Ies Challenge Click',
            'wechat' => 'Wechat',
            'consult' => 'Consult',
            'active' => 'Active',
            'home_visited' => 'Home Visited',
            'qq' => 'Qq',
            'wifi_play' => 'Wifi Play',
            'convert' => 'Convert',
            'like' => 'Like',
            'phone' => 'Phone',
            'play_duration_sum' => 'Play Duration Sum',
            'button' => 'Button',
            'map_search' => 'Map Search',
            'in_app_pay' => 'In App Pay',
            'in_app_order' => 'In App Order',
            'next_day_open_cost' => 'Next Day Open Cost',
            'view' => 'View',
            'phone_confirm' => 'Phone Confirm',
            'advanced_creative_form_click' => 'Advanced Creative Form Click',
            'consult_effective' => 'Consult Effective',
            'next_day_open' => 'Next Day Open',
            'install_finish' => 'Install Finish',
        ];
    }
}
