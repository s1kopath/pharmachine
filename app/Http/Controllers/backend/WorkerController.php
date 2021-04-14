<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function list()
    {
        $title = 'List of all Workers';
        $workers = Worker::all();
        return view('backend.modules.worker.worker', compact('workers', 'title'));
    }

    public function create(Request $request)
    {
        $dateOfBirth = $request->date_of_birth;
        $years = Carbon::parse($dateOfBirth)->age;

        // dd($years);


        Worker::create([

            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'age' => $years,
            'joining_date' => $request->joining_date,
            'salary' => $request->salary,
            'labour_per_hour' => $request->salary / 720
        ]);
        return redirect()->back();
    }

    public function update($id)
    {
        $workers = Worker::find($id);
        $title = 'Update ' . $workers['name'];
        return view('backend.modules.worker.updateWorker', compact('workers', 'title'));
    }

    public function saveUpdate(Request $request)
    {
        $workers = Worker::find($request->id);
        $workers->name = $request->name;
        $workers->address = $request->address;
        $workers->contact = $request->contact;
        $workers->gender = $request->gender;
        $workers->date_of_birth = $request->date_of_birth;
        $workers->age = $request->age;
        $workers->joining_date = $request->joining_date;
        $workers->salary = $request->salary;
        // $workers -> labour_per_hour = $request->labour_per_hour;
        $workers->save();
        return redirect()->route('worker.list');
    }

    public function delete($id)
    {
        $workers = Worker::find($id);
        $workers->delete();
        return redirect()->back();
    }
}
