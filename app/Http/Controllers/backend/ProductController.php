<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $title = 'List of all Products';
        $products = Product::all();
        $materials = Material::all();

        return view('backend.modules.product.product', compact('products', 'title', 'materials'));
    }

    public function listView()
    {
        $title = 'List of all Products';
        $materials = Material::all();
        $products = Product::paginate(5);

        return view('backend.modules.product.productListView', compact('products', 'title', 'materials'));
    }

    public function gridView()
    {
        $title = 'List of all Products';
        $materials = Material::all();
        $products = Product::all();

        return view('backend.modules.product.productGridView', compact('products', 'title', 'materials'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'product_type' => 'required',
            'material_id' => 'required'
        ]);

        $file_name = '';
        //check if $request has file
        if ($request->hasFile('product_image')) {
            //check if file is valid or not
            $file = $request->file('product_image');
            if ($file->isValid()) {
                //generate unique file name
                $file_name = date('Ymdhms') . '.' . $file->getClientOriginalExtension();

                //store image in local directory
                $file->storeAs('product', $file_name);
            }
        }

        Product::create([
            'name' => $request->name,
            'product_type' => $request->product_type,
            'description' => $request->description,
            'material_id' => $request->material_id,
            'image' => $file_name
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $image_path = public_path() . '/files/product/' . $products->image;

        try {
            $products->delete();
            if ($image_path) {
                unlink($image_path);
            }
            return redirect()->back()->with('error', 'Product deleted successfully.');
        } catch (\Throwable $e) {
            if ($e->getCode() == "23000") {
                return redirect()->back()->with('error', 'You can not delete the product, because other tables depends on it.');
            }
            return back();
        }
    }

    public function update($id)
    {
        $products = Product::find($id);
        $title = 'Update ' . $products['name'];

        return view('backend.modules.product.productUpdate', compact('products', 'title'));
    }

    public function saveUpdate(Request $request)
    {
        $product = Product::find($request->id);

        if ($request->hasFile('product_image')) {
            $image_path = public_path() . '/files/product/' . $product->image;

            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $file_name = '';

            $file = $request->file('product_image');
            if ($file->isValid()) {
                $file_name = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('product', $file_name);
            }

            $product->update([
                'image' => $file_name
            ]);
        }

        $product->update([
            'name' => $request->name,
            'product_type' => $request->product_type,
            'description' => $request->description
        ]);

        return redirect()->route('product.listView')->with('success', 'Product updated successfully.');
    }
}
