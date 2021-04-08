<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function materialVendor(){
        return $this->belongsTo(Vendor::class,'vendor_id', 'id');
    }
}
