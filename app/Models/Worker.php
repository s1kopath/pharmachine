<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function workerUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //for getting the available date of worker
    public function workerManufacturing(){
        return $this->hasOne(Manufacturing::class, 'worker_id', 'id')->latest();
    }
}
