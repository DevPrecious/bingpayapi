<?php

namespace BingPay;


use GuzzleHttp\Client;

class Trade {

    public static $apiStatickey;
    public static $client;
    public static $baseURL = 'https://bingpay.ng/api/v1/';

    public function __construct($apikey)
    {
        self::$apiStatickey = $apikey;
        self::$client = new Client();
    }


    public static function airtimeToCash($amount, $network, $phone)
    {
        $data = [
            'amount' => $amount,
            'network' => $network,
            'phone' => $phone
        ];
        $client = self::$client;

        $response = $client->request('POST', self::$baseURL . 'airtime-cash/process', [
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


    public static function getNetworkFee($amount, $network)
    {
        $data = [
            'amount' => $amount,
            'network' => $network
        ];
        $client = self::$client;

        $response = $client->request('POST', self::$baseURL . 'airtime-cash/fee', [
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