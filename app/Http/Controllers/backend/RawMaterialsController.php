<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class RawMaterialsController extends Controller
{
    public function raw(){
        $title = 'Raw Herbs';
        $vendors = Vendor::all();
        $materials = Material::orderBy('available_quantity')->get();
        return view('backend.modules.rawMaterials.rawMaterials', compact('vendors','title','materials'));
    }

    //create vendor
    public function createVendor(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:vendors',
            'contact'=>'required|unique:vendors',
        ]);
        Vendor::create([
            'name' => $request -> name,
            'description' => $request -> description,
            'email' => $request -> email,
            'contact' => $request -> contact,

        ]);
        return redirect() -> back()->with('success','Vendor added successfully.');
    }
    //delete vendor
    public function deleteVendor($id)
    {
        $vendor = Vendor::find($id);

        try {
            $vendor->delete();
            return redirect()->back()->with('error', 'Vendor deleted successfully.');

        } catch (\Throwable $e) {
            if($e->getCode() == "23000"){
                return redirect()->back()->with('error', 'You can not delete this record, because other tables depends on it.');
            }
            return back();
        }
    }

    //create new order
    public function createOrder(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'vendor_id'=>'required',
            'product_per_kg'=>'required|gt:0',
            'product_price_per_kg'=>'required|gt:0',
            'order_date'=>'required'
        ]);
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
        $request->validate([
            'vendor_id'=>'required',
            'order_quantity'=>'required|gt:0',
            'order_date'=>'required'
        ]);

        Material::find($id)->update([
            'vendor_id' => $request -> vendor_id,
            'order_quantity' => $request -> order_quantity,
            'order_date' => $request -> order_date,
            'status'=>'Ordered'
        ]);
        return redirect()->route('raw.dashboard')->with('success','Order places successfully.');
    }
    public function materialDelete($id)
    {
        $material = Material::find($id);
        if ($material->status == 'Ordered') {
            return redirect()->back()->with('error', 'Ordered record can not be deleted.');
        }

        try {
            $material->delete();
            return redirect()->back()->with('error', 'Herb record deleted successfully.');

        } catch (\Throwable $e) {
            if($e->getCode() == "23000"){
                return redirect()->back()->with('error', 'You can not delete the product, because other tables depends on it.');
            }
            return back();
        }
    }

}
