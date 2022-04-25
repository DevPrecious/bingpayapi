<?php

namespace BingPay;


use GuzzleHttp\Client;

class Verify {

    public static $apiStatickey;
    public static $client;
    public static $baseURL = 'https://bingpay.ng/api/v1/';

    public function __construct($apikey)
    {
        self::$apiStatickey = $apikey;
        self::$client = new Client();
    }

    public static function verifyBvn($firstname, $lastname, $phone, $bvn)
    {
        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'bvn' => $bvn
        ];
        $client = self::$client;

        $response = $client->request('POST', self::$baseURL . 'verify/bvn', [
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