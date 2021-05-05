<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Vendor;
use Illuminate\Http\Request;

class RawMaterialsController extends Controller
{
    public function raw(){
        $title = 'Raw Materials';
        $vendors = Vendor::all();
        $materials = Material::orderBy('available_quantity')->get();
        return view('backend.modules.rawMaterials.rawMaterials', compact('vendors','title','materials'));
    }

    //create vendor
    public function createVendor(Request $request){
        Vendor::create([
            'name' => $request -> name,
            'description' => $request -> description,
            'email' => $request -> email,
            'contact' => $request -> contact,

        ]);
        return redirect() -> back()->with('success','Vendor added successfully.');
    }

    //create new order
    public function createOrder(Request $request)
    {
        Material::create([
            'name' => $request -> name,
            'description' => $request -> description,
            'vendor_id' => $request -> vendor_id,
            'product_per_kg' => $request -> product_per_kg,
            'product_price_per_kg' => $request -> product_price_per_kg,
            'available_quantity' => $request -> order_quantity,
            'order_quantity' => $request -> order_quantity,
            'order_date' => $request -> order_date

        ]);
        return redirect() -> back()->with('success','Material ordered successfully.');
    }

    //place order
    public function updateOrder($id){
        $title='Place Order';
        $placeMaterialOrders = Material::find($id);
        $vendors = Vendor::all();
        return view('backend.modules.rawMaterials.orderMaterial', compact('placeMaterialOrders','vendors','title'));

    }
    //send order
    public function sendOrder(Request $request, $id){

        Material::find($id)->update([
            // 'name' => $request -> name,
            // 'description' => $request -> description,
            'vendor_id' => $request -> vendor_id,
            // 'total_quantity' => $request -> order_quantity,
            // 'available_quantity' => $request -> order_quantity,
            'order_quantity' => $request -> order_quantity,
            'order_date' => $request -> order_date,
            'status'=>'Ordered'
        ]);

        // $placeMaterialOrders -> name = $request->name;
        // $placeMaterialOrders -> description = $request->description;
        // $placeMaterialOrders -> order_date = $request->order_date;
        // $placeMaterialOrders -> vendor_id = $request->vendor_id;
        // $placeMaterialOrders -> order_quantity = $request->order_quantity;
        // $placeMaterialOrders -> order_date = $request->order_date;
        // $placeMaterialOrders -> save();




        return redirect()->route('raw.dashboard')->with('success','Order places successfully.');
    }
}
