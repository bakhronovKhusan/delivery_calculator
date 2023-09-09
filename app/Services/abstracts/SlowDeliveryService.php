<?php

namespace App\Services\abstracts;

use App\models\CalculationResults;
use App\models\Company;
use App\models\Shipments;
use App\Services\interfaces\DeliveryServiceInterface;

abstract class SlowDeliveryService implements DeliveryServiceInterface
{
    protected $name;
    protected  $company;
    protected  $calculationResult;
    protected  $shipment;
    public function __construct()
    {
        $this->company = (new Company)->install($this->name);
        $this->shipment = new Shipments;
        $this->calculationResult = new CalculationResults;
    }
    public function calculateCostAndDate($sourceKladr, $targetKladr, $weight)
    {
        $shipmentId = $this->shipment->add($sourceKladr,$targetKladr,$weight,'slow',$this->company->id);
        $price = $this->company->slow_base_price * $this->calculateCoefficient($weight);
        $delivery_date = date('Y-m-d', strtotime("+{$this->company->period_slow} days"));
        $this->calculationResult->add($shipmentId,$price,$delivery_date);
        return [
            'price' => $price,
            'date' => $delivery_date,
            'error' => null,
        ];

    }
    private function calculateCoefficient($weight) {
        if ($weight > 10) {
            return 1.2; // Например, коэффициент 1.2 для больших отправлений
        } else {
            return 1.0; // Обычный коэффициент
        }
    }
}