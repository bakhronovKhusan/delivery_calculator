<?php

namespace App\controllers;

use App\models\DeliveryCalculator;
use App\Services\MockFastDeliveryService;
use App\Services\MockSlowDeliveryService;
use Core\Controller;

class indexController extends Controller
{
    public function add($params)
    {
//        FOR service Mosk
        $deliveryFast = new DeliveryCalculator(new MockFastDeliveryService());
        $result['fast'] = $deliveryFast->calculateDeliveryCostAndDate($params['sourceKladr'],$params['targetKladr'],$params['weight']);

        $deliverySlow = new DeliveryCalculator(new MockSlowDeliveryService());
        $result['slow'] = $deliverySlow->calculateDeliveryCostAndDate($params['sourceKladr'],$params['targetKladr'],$params['weight']);

        return json_encode($result);
    }

    public function show(){
//        TODO --SHOW ALL INFO
    }
}