<?php

namespace App\models;

use App\Services\interfaces\DeliveryServiceInterface;

class DeliveryCalculator
{
    private $deliveryService;

    public function __construct(DeliveryServiceInterface $deliveryService) {
        $this->deliveryService = $deliveryService;
    }

    public function calculateDeliveryCostAndDate($sourceKladr, $targetKladr, $weight) {
        return $this->deliveryService->calculateCostAndDate($sourceKladr, $targetKladr, $weight);
    }
}