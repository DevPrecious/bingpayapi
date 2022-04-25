<?php

namespace BingPay;


use GuzzleHttp\Client;



class Airtime {

    public static $apiStatickey;
    public static $client;
    public static $baseURL = 'https://bingpay.ng/api/v1/';

    public function __construct($apikey)
    {
        self::$apiStatickey = $apikey;
        self::$client = new Client();
    }

    public static function getAllNetwork(){
        $client = self::$client;

        $response = $client->request('GET', self::$baseURL.'all-networks', [
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

    public static function buyAirtime($phone, $amount, $network){
        $data = [
            'phone' => $phone,
            'amount' => $amount,
            'network' => $network
        ];
        $client = self::$client;

        $response = $client->request('POST', self::$baseURL.'buy-airtime', [
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

    public static function verifyPhone($country, $phone){
        $data = [
            'country' => $country,
            'phone' => $phone
        ];

        $client = self::$client;
        $response = $client->request('POST', self::$baseURL.'/verify/phone', [
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

}