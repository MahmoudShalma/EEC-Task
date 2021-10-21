<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{

    protected $fillable = ['name', 'Address', 'Number'];

    public function shipment()
    {
        return $this->hasMany(shipment::class);
    }
}
