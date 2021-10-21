<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image'];
    protected $table = "products";


    public function shipments()
    {
        return $this->belongsToMany(Shipment::class, "shipment_products");
    }
}
