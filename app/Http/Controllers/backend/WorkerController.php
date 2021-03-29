<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function list(){
        $title = 'List of all Workers';
        $workers = Worker::all();
        return view('backend.modules.worker.worker',compact('workers','title'));
    }


    public function update($id){
        $workers = Worker::find($id);
        $title = 'Update '.$workers['name'];
        return view('backend.modules.worker.updateWorker',['products'=>$workers], compact('title'));
    }


    public function create(Request $request){
        Worker::create([
            'name' => $request -> name,
            'address' => $request -> address,
            'contact' => $request -> contact,
            'gender' => $request -> gender,
            'date_of_birth' => $request -> date_of_birth,
            'age' => $request -> age,
            'joining_date' => $request -> joining_date,
            'salary' => $request -> salary,
            'labour_per_hour' => $request -> labour_per_hour
        ]);
        return redirect()-> back();
    }
}
