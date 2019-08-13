<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dy_auth_code".
 *
 * @property int $id
 * @property string $account 账号
 * @property string $auth_code 授权码
 * @property int $channel_id 渠道平台\\n1：抖音\\n2：快手
 * @property string $date_time 创建或者更新时间
 */
class DyAuthCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dy_auth_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account', 'auth_code', 'channel_id'], 'required'],
            [['channel_id'], 'integer'],
            [['date_time'], 'safe'],
            [['account'], 'string', 'max' => 45],
            [['auth_code'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => 'Account',
            'auth_code' => 'Auth Code',
            'channel_id' => 'Channel ID',
            'date_time' => 'Date Time',
        ];
    }
}
