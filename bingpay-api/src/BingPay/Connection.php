<?php

namespace BingPay;

class Connection
{
    public $privateKey;
   

    public function addPrivateKey(string $privateKey)
    {
        $this->privateKey = $privateKey;

    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }
}
