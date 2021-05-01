<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class RawMaterialsController extends Controller
{
    public function showMaterials()
    {
        $title='Material Status';
        $materials=Material::all();
        return view('backend.workerModules.rawMaterials.rawMaterials', compact('title','materials'));
    }

    public function receiveOrder($id){
        $order = Material::find($id);

        $quantity = $order->available_quantity + $order->order_quantity;

        $order->update([
            'available_quantity'=>$quantity,
            'order_quantity'=> 0,
            'status' => 'Available'
        ]);
        return redirect()->back();
    }
}
