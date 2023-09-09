<?php

namespace App\controllers;

use App\models\DeliveryCalculator;
use App\Services\MockFastDeliveryService;
use App\Services\MockSlowDeliveryService;
use Core\Controller;

class indexController extends Controller
{
    public function add()
    {
//        FOR service Mosk
        $deliveryFast = new DeliveryCalculator(new MockFastDeliveryService());
        $result['fast'] = $deliveryFast->calculateDeliveryCostAndDate('Piter','Maskva',12);

        $deliverySlow = new DeliveryCalculator(new MockSlowDeliveryService());
        $result['slow'] = $deliverySlow->calculateDeliveryCostAndDate('Piter','Maskva',12);

        return json_encode($result);
    }

    public function show(){
//        TODO --SHOW ALL INFO
    }
}