<?php

namespace App\Services;
use App\Services\abstracts\SlowDeliveryService;

class MockSlowDeliveryService extends SlowDeliveryService
{
    protected $name='Mosk';
}