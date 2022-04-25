# Usage

Download the repo, head over to index.php and edit the addPrivateKey() by adding your key.. thats all for installation.

## Example code
To check balance of your account, you can use the following code:

```php

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
```