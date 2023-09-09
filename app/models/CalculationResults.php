<?php

namespace App\models;

use Core\Model;

class CalculationResults extends Model
{
    protected $table = 'calculation_results';

    public function add($shipment_id,
                        $price,
                        $delivery_date,
                        $error_message=null)
    {
        return $this->insert($this->table,[
                'shipment_id'   => $shipment_id,
                'price'         => $price,
                'delivery_date' => $delivery_date,
                'error_message' => $error_message,
        ]);
    }

}