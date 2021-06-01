<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function demandProduct()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function demandManufacturing()
    {
        return $this->hasOne(Manufacturing::class,'demand_id','id');
    }
}
