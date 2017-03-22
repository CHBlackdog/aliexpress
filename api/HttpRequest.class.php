<?php
/**
 * Created by PhpStorm.
 * User: CHBlackdog
 * Date: 2017/3/20
 * Time: 下午9:03
 */
class HttpRequest {

    static function request_get($url = '', $post_data = array()){
        return self::request($url,$post_data,0);
    }

    static function request_post($url = '', $post_data = array()){
        return self::request($url,$post_data,1);
    }

    static function request($url = '', $post_data = array(),$type = 0) {
        if (empty($url) ) {
            return false;
        }

        $o = "";
        if(!empty($post_data)){
            foreach ( $post_data as $k => $v )
            {
                $o.= "$k=" . urlencode( $v ). "&" ;
            }
            $post_data = substr($o,0,-1);
        }

        $postUrl = $url;
        $curlPost = $post_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        if($type < -1 || $type > 4){
            $type = 0;
        }
        curl_setopt($ch, CURLOPT_POST, $type);//提交方式(默认get)
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }
}