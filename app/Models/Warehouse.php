<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function stockManufacturing()
    {
        return $this->belongsTo(Manufacturing::class,'manufacturing_id', 'id');
    }
    public function deliveryUser()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
