<?php

namespace BingPay;


use GuzzleHttp\Client;

class Bank {

    public static $apiStatickey;
    public static $client;
    public static $baseURL = 'https://bingpay.ng/api/v1/';

    public function __construct($apikey)
    {
        self::$apiStatickey = $apikey;
        self::$client = new Client();
    }

    public static function getAllBanks(){
        $client = self::$client;

        $response = $client->request('GET', self::$baseURL . 'all-banks', [
            'headers' => [
                'Authorization' => 'Bearer ' . self::$apiStatickey,
                'Content-Type' => 'application/json'
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            try {
                $body = json_decode($response->getBody());
                return $body;
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }


    public static function resolveBankAccount($bank_code, $account_number){
        $data = [
            'bank_code' => $bank_code,
            'account_number' => $account_number
        ];
        $client = self::$client;

        $response = $client->request('POST', self::$baseURL . 'resolve-account', [
            'headers' => [
                'Authorization' => 'Bearer ' . self::$apiStatickey,
                'Content-Type' => 'application/json'
            ],
            'json' => $data
        ]);

        if ($response->getStatusCode() == 200) {
            try {
                $body = json_decode($response->getBody());
                return $body;
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }

}