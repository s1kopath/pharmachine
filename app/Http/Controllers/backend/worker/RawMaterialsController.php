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
}
