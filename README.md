# Usage

Download the repo, head over to index.php and edit the addPrivateKey() by adding your key.. thats all for installation.

## Example code
To check balance of your account, you can use the following code:

```php
// make sure to call the class Bingpay
$bingpay = new BingPay();

$bingpay->getBalance()->data->balance;

```

# Airtime Class

```php
// Get all networks
 var_dump($bingpay->fetchAllNetwork());
// returns an array of all networks
// you can loop through the arrays from the data property
foreach($bingpay->fetchAllNetwork()->data as $data){
    echo 'Network Provider: '.$data->name;
    echo '<br>';
    echo 'Network Note: '.$data->note;
    echo '<br>';
}
// Purchase Airtime
$bingpay->purchaseAirtime('08733', 100, 1)->message;
// returns a message
// Verify Phone Number
$bingpay->verifyNumber('08733', 100)->message;
// returns a message
```

# Bank Class
```php
// Get all banks
$bingpay->fetchAllBanks();
// returns an array of all banks
// resolve bank
$bingpay->resolveBank(214, 7412636015)->message;
// returns a message
```

# Data class
```php
// Get all data plans
$bingpay->getAllDataPlan();
// returns an array of all data plans
// Get data plan of a network
$bingpay->getDataPlan(1);
// returns an array of data plan
// Purchase data
$bingpay->buyData('082', 100, 1);
// returns a message
```

# Trade class
```php
//Convert airtime to cash
$bingpay->airtimeToCash(100, 1, '081')->message;
// returns a message
// Get network fee
$bingpay->getNetworkFee(100, 1)->message;
// returns a message
```

# Utility class
```php
$bingpay->getAllService();
// returns an array of all services
// Get service of a network
$bingpay->getSingleService(1);
// returns an array of service
$bingpay->verifyCustomer(1,1,'prepaid')->message;
// returns a message
$bingpay->purchaseBill(1,1,2,1)->message;
// returns a message
```

# Verify class
```php
// Verify BVN number
$bingpay->verifyBVN('john', 'dod', '0811', '8393')->message;
// returns a message
```