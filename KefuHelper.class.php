<?php

namespace Com\Kefu;

class KefuHelper {
    /**
     * @param      $url
     * @param null $data
     * @param int  $timeout
     *
     * @return mixed
     */
    public function https_request($url, $data = NULL, $timeout = 5000) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        if ($timeout) {
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        }
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        if ($output === FALSE) {
            echo('Curl error: ' . curl_error($curl) . ". url:" . $url);
        }
        
        curl_close($curl);
        
        return $output;
    }
}