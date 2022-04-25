<?php

namespace BingPay;


use GuzzleHttp\Client;



class Data {

    public static $apiStatickey;
    public static $client;
    public static $baseURL = 'https://bingpay.ng/api/v1/';

    public function __construct($apikey)
    {
        self::$apiStatickey = $apikey;
        self::$client = new Client();
    }

    public static function buyData($phone, $plan, $network){
        $data = [
            'phone' => $phone,
            'plan' => $plan,
            'network' => $network
        ];
        $client = self::$client;

        $response = $client->request('POST', self::$baseURL.'buy-data', [
            'headers' => [
                'Authorization' => 'Bearer '.self::$apiStatickey,
                'Content-Type' => 'application/json'
            ],
            'json' => $data
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


    public static function getAllDataPlan(){
        $client = self::$client;
        $response = $client->request('GET', self::$baseURL.'all-data-plans', [
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


    public static function getDataPlan($network_id){
        $client = self::$client;
        $response = $client->request('GET', self::$baseURL.'data-plans/'.$network_id, [
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