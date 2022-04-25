<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

require_once './bingpay-api/vendor/autoload.php';


require_once './bingpay-api/src/BingPay/Connection.php';
require_once './bingpay-api/src/BingPay/Wallet.php';
require_once './bingpay-api/src/BingPay/Airtime.php';
require_once './bingpay-api/src/BingPay/Bank.php';
require_once './bingpay-api/src/BingPay/Data.php';
require_once './bingpay-api/src/BingPay/Trade.php';
require_once './bingpay-api/src/BingPay/Utility.php';
require_once './bingpay-api/src/BingPay/Verify.php';


use BingPay\Connection;
use BingPay\Wallet;
use BingPay\Airtime;
use BingPay\Bank;
use BingPay\Data;
use BingPay\Trade;
use BingPay\Utility;
use BingPay\Verify;

class Bingpay
{


    public function __construct()
    {
        // call the connection class
        $connection = new Connection();

        // Add your private key here
        $connection->addPrivateKey('1dd501141dffd9d68f254b241f05871b8f10754c90f4832ad9');

        // Get the private key
        $key = $connection->getPrivateKey();


        new Wallet($key);
        new Airtime($key);
        new Bank($key);
        new Data($key);
        new Trade($key);
        new Utility($key);
        new Verify($key);
    }

    public function getBalance()
    {

        $getBalace = Wallet::checkBalance();

        return $getBalace;
    }

    public function fetchAllNetwork()
    {
        $allNetwork = Airtime::getAllNetwork();

        return $allNetwork;
    }

    public function purchaseAirtime($phone, $amount, $network){
        $purchase = Airtime::buyAirtime($phone, $amount, $network);

        return $purchase;
    }

    public function verifyNumber($country, $number){
        $verify = Airtime::verifyPhone($country, $number);

        return $verify;

    }

    public function fetchAllBanks()
    {
        $fetchall = Bank::getAllBanks();
        return $fetchall;
    }

    public function resolveBank($bank_code, $account_number)
    {
        $resolve = Bank::resolveBankAccount($bank_code, $account_number);
        return $resolve;
    }

    public function buyData($phone, $plan, $network)
    {
        $buydata = Data::buyData($phone, $plan, $network);
        return $buydata;
    }

    public function getAllDataPlan()
    {
        $getAllDataPlan = Data::getAllDataPlan();
        return $getAllDataPlan;
    }

    public function getDataPlan($network_id)
    {
        $getDataPlan = Data::getDataPlan($network_id);
        return $getDataPlan;
    }

    public function airtimeToCash($amount, $network, $phone)
    {
       $airtimeToCash = Trade::airtimeToCash($amount, $network, $phone);
       return $airtimeToCash;
    }

    public function getNetworkFee($amount, $network_id)
    {
        $getNetworkFee = Trade::getNetworkFee($amount, $network_id);
        return $getNetworkFee;
    }

    public function getAllService()
    {

        $getAllService = Utility::getAllService();

        return $getAllService;
    }

    public function getSingleService($service_id)
    {
        $getSingleService = Utility::getSingleService($service_id);
        return $getSingleService;
    }

    public function verifyCustomer($service_id, $customer_id, $type)
    {
        $verifyCustomer = Utility::verifyCustomer($service_id, $customer_id, $type);
        return $verifyCustomer;
    }

    public function purchaseBill($service_id, $customer_id, $variation, $amount)
    {
        $purchaseBill = Utility::purchaseBill($service_id, $customer_id, $variation, $amount);
        return $purchaseBill;
    }

    public function verifyBvn($firstname, $lastname, $phone, $bvn)
    {
        $verifyBvn = Verify::verifyBvn($firstname, $lastname, $phone, $bvn);
        return $verifyBvn;
    }
}

