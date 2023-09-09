<?php

namespace App\models;
use Core\Database;
use Core\Model;

class Company extends Model
{
    protected $table = 'companies';
    public function install($name){
        return $this->where( $this->table, " where `name`='".$name."'")[0];
    }
}