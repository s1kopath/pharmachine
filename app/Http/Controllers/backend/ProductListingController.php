<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductListingController extends Controller
{
    public function pl(){
        return view('backend.modules.productListing');
    }
}
