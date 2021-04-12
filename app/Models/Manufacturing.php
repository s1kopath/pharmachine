<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturing extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function manufacturingProduct(){
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
    public function manufacturingMaterial()
    {
        return $this->belongsTo(Material::class,'material_id','id');
    }
    public function manufacturingWorker()
    {
        return $this->belongsTo(Worker::class,'worker_id','id');
    }
    public function manufacturingWorkstation()
    {
        return $this->belongsTo(Workstation::class,'workstation_id','id');
    }
}

