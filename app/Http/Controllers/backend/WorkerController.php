<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerController extends Controller
{
    public function list()
    {
        $ageLimit = Carbon::today()->subYears(18)->format('Y-m-d');
        $title = 'List of all Workers';
        $workers = Worker::all();
        return view('backend.modules.worker.worker', compact('workers', 'title','ageLimit'));
    }

    public function create(Request $request)
    {
        $file_name = '';
        if ($request -> hasFile('worker_image')) {
            $file = $request -> file('worker_image');
            if ($file -> isValid()) {
                $file_name = date('Ymdhms').'.'.$file -> getClientOriginalExtension();
                $file-> storeAs('worker', $file_name);
            }
        }



        // DB::beginTransaction();
        // try {

        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'address'=>'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'salary'=>'required|gt:0',
        ]);

        $dateOfBirth = $request->date_of_birth;
        $years = Carbon::parse($dateOfBirth)->age;

        $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('123456')
            ]);

        Worker::create([
                'user_id' => $users->id,
                'address' => $request->address,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'age' => $years,
                'joining_date' => $request->joining_date,
                'salary' => $request->salary,
                'labour_per_hour' => $request->salary / 720,
                'image' => $file_name
            ]);
        return redirect()->back()->with('success', $request->name.' is hired successfully.');
        //     DB::commit();
        // } catch (\Throwable $exception) {
        //     DB::rollback();
        //     return redirect();
        // }
    }

    public function update($id)
    {
        $workers = Worker::find($id);
        $users = User::find($workers->user_id);
        $title = 'Update ' . $workers['name'];
        return view('backend.modules.worker.updateWorker', compact('workers', 'title', 'users'));
    }

    public function saveUpdate(Request $request, $id)
    {
        // $workers = Worker::find($request->id);
        // $users = User::find($workers->user_id);

        // $dateOfBirth = $request->date_of_birth;
        // $years = Carbon::parse($dateOfBirth)->age;


        // $users->name = $request->name;
        // $users->email = $request->email;

        // $workers->address = $request->address;
        // $workers->contact = $request->contact;
        // $workers->gender = $request->gender;
        // $workers->date_of_birth = $request->date_of_birth;
        // $workers->age = $years;
        // $workers->joining_date = $request->joining_date;
        // $workers->salary = $request->salary;
        // $workers -> labour_per_hour = $request->salary / 720;

        // $workers->save();
        // $users->save();

        $request->validate([
            'email'=>'email|unique:users',
        ]);

        $dateOfBirth = $request->date_of_birth;
        $years = Carbon::parse($dateOfBirth)->age;
        $workers = Worker::find($id);

        if ($request->hasFile('image')) {
            $image_path = public_path().'/files/worker/'.$workers->image;
            if (file_exists($workers->image)) {
                unlink($image_path);
            }
            $file_name='';
            $file = $request -> file('image');
            if ($file -> isValid()) {
                $file_name = date('Ymdhms').'.'.$file -> getClientOriginalExtension();
                $file -> storeAs('worker', $file_name);
            }
            $workers->update([
                'image' => $file_name
            ]);
        }

        $workers->update([
            'address'=> $request->address,
            'contact'=>$request->contact,
            'gender'=>$request->gender,
            'date_of_birth'=> $request->date_of_birth,
            'age' => $years,
            'joining_date'=>$request->joining_date,
            'salary'=> $request->salary,
            'labour_per_hour' => $request->salary / 720
        ]);
        User::find($workers->user_id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('worker.list')->with('success', 'Worker info updated successfully.');
    }

    public function delete($id)
    {
        $workers = Worker::find($id);
        $user = User::find($workers->user_id);
        $image_path = public_path().'/files/worker/'.$workers->image;

        try {
            $workers->delete();
            $user->delete();
            if ($image_path) {
                unlink($image_path);
            }
            return redirect()->back()->with('error', 'Worker successfully fired.');

        } catch (\Throwable $e) {
            if($e->getCode() == "23000"){
                return redirect()->back()->with('error', 'You can not delete this record, because other tables depends on it.');
            }
            return back();
        }
    }


    public function workerProfile($id)
    {
        $title= '';
        $workers = Worker::find($id);
        $users = User::find($workers->user_id);
        return view('backend.modules.worker.workerProfile', compact('workers', 'title', 'users'));
    }

    public function searchWorker(Request $request)
    {
        $search = $request->input('search');
        $ageLimit = Carbon::today()->subYears(18)->format('Y-m-d');
        $title = 'List of all Workers';
        if($request->has('search')){
            $workers = Worker::whereHas('workerUser',function($query) use($search){

                $query->where('name','like',"%{$search}%");

            })->paginate(10);
        }else{
            $workers = Worker::all();
        }

        return view('backend.modules.worker.worker', compact('workers', 'title','ageLimit'));
    }
}
