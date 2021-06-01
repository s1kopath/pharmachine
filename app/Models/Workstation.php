<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workstation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function damageReport()
    {
        return $this->hasOne(WorkstationRepair::class,'workstation_id','id');
    }
    public function workstationManufacturing()
    {
        return $this->hasOne(Manufacturing::class,'workstation_id','id')->latest();
    }
}
