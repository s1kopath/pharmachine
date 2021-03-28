<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class RawMaterialsController extends Controller
{
    public function raw(){
        $vendors = Vendor::all();
        return view('backend.modules.rawMaterials.rawMaterials', compact('vendors'));
    }
    public function createVendor(Request $request){
        Vendor::create([
            'name' => $request -> name,
            'description' => $request -> description,
            'email' => $request -> email,
            'contact' => $request -> contact,

        ]);
        return redirect() -> back();
    }

}
