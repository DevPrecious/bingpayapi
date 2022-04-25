<?php

namespace BingPay;


use GuzzleHttp\Client;

class Utility
{
    public static $apiStatickey;
    public static $client;
    public static $baseURL = 'https://bingpay.ng/api/v1/';

    public function __construct($apikey)
    {
        self::$apiStatickey = $apikey;
        self::$client = new Client();
    }

    public static function getAllService()
    {
        $client = self::$client;

        $response = $client->request('GET', self::$baseURL . 'all-services', [
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

    public static function getSingleService($service_id)
    {
        $client = self::$client;

        $response = $client->request('GET', self::$baseURL . 'service/' . $service_id, [
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

    public static function verifyCustomer($service_id, $customer_id, $type)
    {
        $data = [
            'service_id' => $service_id,
            'customer_id' => $customer_id,
            'type' => $type
        ];
        $client = self::$client;

        $response = $client->request('POST', self::$baseURL . 'validate-service', [
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

    public static function purchaseBill($service_id, $customer_id, $variation, $amount)
    {
        $data = [
            'service_id' => $service_id,
            'customer_id' => $customer_id,
            'variation' => $variation,
            'amount' => $amount
        ];
        $client = self::$client;

        $response = $client->request('POST', self::$baseURL . 'purchase-bill', [
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
