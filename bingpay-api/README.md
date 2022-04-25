# Usage

## Connect to bingpay api with your key

```php
  <?php

    require_once './vendor/autoload.php';
    
    //Import the connection class
    
    use BingPay\Connection;
    
    // call the connection class
    $connection = new Connection();

    // Add your private key here
    $connection->addPrivateKey('1dd501141dffd9d68f254b241f05871b8f10754c90f4832ad9');

    // Get the private key
    $key = $connection->getPrivateKey();
    
    ?>
```

## Request to check balance

```php

//Import the Wallet class

new Wallet($key);

// Check the balance
$check_bal = Wallet::checkBalance();

// if check balance is successful print the balance and the currency
if($check_bal){
    echo 'Balance:'. ' ' .$check_bal->data->balance;
    echo '<br>';
    echo 'Currency:'. ' ' .$check_bal->data->currency;
}else{
    echo $check_bal->message;
}

```

### Lists of available request under airtime class
```php
//Get all network
Airtime::getAllNetwork();
// Buy airtime
Airtime::buyAirtime($phone, $amount, $network);
// Verify phone number
Airtime::verifyPhone('NG', '07061785183');
```

## Request under Data class
```php
new Data($key);
// Get all data plan
Data::getAllDataPlan();
// Get data plan for a network with ID
Data::getDataPlan(2);
// Buy data
Data::buyData('07061785183', '100', 1);
```

### Also utility class to handle the bills and others
### List of requests

```php
//Initialize utility class
new Utility($key);
//Get all services
Utility::getAllService();
// Get all service by service ID
Utility::getSingleService('dstv');
//Verify customer
Utility::verifyCustomer('dstv', '7530552372', 'prepaid');
//Purchase Bill
Utility::purchaseBill('dstv', '1212121212', 'OGpeIVhvRsnDdarBET0XQ/Hw', '2150');
```

### Bank class requests

```php
new Bank($key);
//Get all banks
Bank::getAllBanks();
//Resolve bank account
Bank::resolveBankAccount('214', '7412636015');
```

## Bvn class requests

```php
new Verify($key)
//Verify BVN
Verify::verifyBVN('John', 'Doe', '0701234567', '0123456789');
```

## Convert class requests

```php
//Airtime to cash
new Trade($key);
Trade::airtimeToCash('1000', 1, '08142403525');

// Get newtwork fee
Trade::getNetworkFee(5000, 4);
```

## Note.. example code if you have another folder

```php
<?php

ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );

require_once '../vendor/autoload.php';


require_once '../src/BingPay/Connection.php';
require_once '../src/BingPay/Wallet.php';


use BingPay\Connection;
use BingPay\Wallet;



// call the connection class
$connection = new Connection();

// Add your private key here
$connection->addPrivateKey('1dd501141dffd9d68f254b241f05871b8f10754c90f4832ad9');

// Get the private key
$key = $connection->getPrivateKey();


new Wallet($key);

$dd = Wallet::checkBalance();

echo $dd->message;
```

## Have any issue?
Create issue
