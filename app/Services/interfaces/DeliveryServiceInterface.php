<?php

namespace App\Services\interfaces;
interface DeliveryServiceInterface {
    public function calculateCostAndDate($sourceKladr, $targetKladr, $weight);
}