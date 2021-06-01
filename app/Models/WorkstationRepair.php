<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkstationRepair extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function reportWorker()
    {
        return $this->belongsTo(Worker::class,'worker_id','id');
    }
}
