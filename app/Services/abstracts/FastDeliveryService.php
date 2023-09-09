<?php

namespace App\Services\abstracts;

use App\models\CalculationResults;
use App\models\Company;
use App\models\Shipments;
use App\Services\interfaces\DeliveryServiceInterface;

abstract class FastDeliveryService implements DeliveryServiceInterface
{
    protected $name;
    protected  $company;

    protected  $calculationResult;
    protected  $shipment;
    public function __construct()
    {
        $this->company = (new Company())->install($this->name);
        $this->shipment = new Shipments;
        $this->calculationResult = new CalculationResults;
    }

    public function calculateCostAndDate($sourceKladr, $targetKladr, $weight) {
        $shipmentId = $this->shipment->add($sourceKladr,$targetKladr,$weight,'fast',$this->company->id);
            $price = $this->calculatePrice($weight);
            $delivery_date = date('Y-m-d', strtotime("+ {$this->company->period_fast} days"));
        $this->calculationResult->add($shipmentId,$price,$delivery_date);
        return [
            'price' =>$price,
            'date' => $delivery_date,
            'error' => null,
        ];
    }
    private function calculatePrice($weight) {
        return $this->company->fast_base_price + $weight * $this->company->fast_per_kg_price;
    }
}