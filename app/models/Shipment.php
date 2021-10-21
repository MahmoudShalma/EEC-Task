<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'description',
        'shipment_number',
        'status',
        'address',
        'courier_id'
    ];

    
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "shipment_products")->withPivot("count");
    }
}
