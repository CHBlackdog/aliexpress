<?php
/**
 * Created by PhpStorm.
 * User: CHBlackdog
 * Date: 2017/3/20
 * Time: 下午9:24
 */
include('HttpRequest.class.php');

class RequestApi{
    private static $ALI_API_ADDRESS = 'https://freight.aliexpress.com';

    private static $GET_ADDRESS_LIST = '/ajaxFreightGetAddressListNew.htm';

//    获取地址列表
    static function getAddressList(){
        $url = self::$ALI_API_ADDRESS.self::$GET_ADDRESS_LIST;
        $res = HttpRequest::request_post($url, '');
        $start = strpos($res,'(') + 1;
        $res = substr($res,$start,strlen($res)-$start-1);
        $json_decoded = json_decode($res);

        try{
            return $json_decoded->countries;
        }catch(Exception $exception){
            return array();
        }
    }
}