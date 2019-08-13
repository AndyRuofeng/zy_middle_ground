<?php
/**
 * Created by  ruofeng
 * Date: 2019-08-09
 * Time: 16:19
 */


namespace backend\helper;


use yii\base\ErrorException;

class HttpService
{
    protected static $_instance = null;

    static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /*
     * get 请求
     */
    public function get($url, $params = [], $header = [])
    {
        return $this->_do_request($url, $params, false, $header);
    }

    /*
     * post 请求
     */
    public function post($url, $params = [], $header = [] )
    {
        return $this->_do_request($url, $params, true, $header);
    }

    /*
     * 格式化header
     */
    private function _format_header(array $header)
    {
        $_header = [];
        if(!empty($header)){
            foreach ($header as $k => $v){
                $_header[] = $k . ':' . $v ;
            }
        }
        return $_header;
    }

    /*
     * 请求接口
     *
     */
    private function _do_request($url, $params, $is_post = false, $header = [])
    {
        $url = rtrim($url, '/');
        if (!$is_post && !empty($params)) {
            $query_string = urldecode(http_build_query($params));
            $url .= '?' . $query_string;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $header = !empty($header) ? $this->_format_header($header) : [];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        if ($is_post) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        $output = curl_exec($ch);
        if ($output === FALSE) {
            // error log
            throw new ErrorException("api|cURL Error: " . curl_error($ch));
        }
        curl_close($ch);
        $rs = json_decode($output, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ErrorException('api错误，返回体错误:' . json_last_error());
        }

        return $rs;
    }
}