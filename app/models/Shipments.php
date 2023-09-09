<?php

namespace App\models;

use Core\Model;

class Shipments extends Model
{
    protected $table = 'shipments';
    public function add($source_kladr,
                        $target_kladr,
                        $weight,
                        $service_type,
                        $company_id )
    {
        return $this->insert($this->table,[
            'source_kladr' => $source_kladr,
            'target_kladr' => $target_kladr,
            'weight'       => $weight,
            'service_type' => $service_type,
            'company_id'   => $company_id,
        ]);
    }
}