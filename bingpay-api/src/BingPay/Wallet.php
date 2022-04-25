<?php

namespace BingPay;

use GuzzleHttp\Client;



class Wallet {

    public static $apiStatickey;
    public static $client;
    public static $baseURL = 'https://bingpay.ng/api/v1/';

    public function __construct($apikey)
    {
        self::$apiStatickey = $apikey;
        self::$client = new Client();
    }

    public static function checkBalance(){
        $client = self::$client;

        $response = $client->request('GET', self::$baseURL.'self/balance', [
            'headers' => [
                'Authorization' => 'Bearer '.self::$apiStatickey,
                'Content-Type' => 'application/json'
            ]
        ]);

        if($response->getStatusCode() == 200){
            try{
                $body = json_decode($response->getBody());
                return $body;
            }catch(Exception $e){
                return false;
            }
        }else{
            return false;
        }

    }

}