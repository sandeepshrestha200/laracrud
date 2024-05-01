<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //This method will show the product Page
    public function index()
    {
        $products = Product::orderBy("created_at", "DESC")->get();
        return view('products.list', [
            'products' => $products,
        ]);
    }

    //This method will show the create product Page
    public function create()
    {
        return view('products.create');
    }

    //This method will show the store a product in db
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',

        ];

        if ($request->image != "") {
            $rules['image'] = "image";
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route("products.create")->withInput()->withErrors($validator);
        }

        // inserting data on db

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // handeling image

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;

            // save image in product directory
            $image->move(public_path("uploads/products"), $imageName);

            // save image name in database
            $product->image = $imageName;
            $product->save();
        }





        return redirect()->route("products.index")->with("success", "Product added successfully.");
    }
    //This method will show the edit product page
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    //This method will show the update a product in db
    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);

        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',

        ];

        if ($request->image != "") {
            $rules['image'] = "image";
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route("products.edit", $product->id)->withInput()->withErrors($validator);
        }

        // Updating data on db

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();


        if ($request->image != "") {
            //delete old image

            File::delete(public_path("uploads/products/" . $product->image));

            // handeling image

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;

            // save image in product directory
            $image->move(public_path("uploads/products"), $imageName);

            // save image name in database
            $product->image = $imageName;
            $product->save();
        }





        return redirect()->route("products.index")->with("success", "Product updated successfully.");
    }

    //This method will show the delete a product in db
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image != "") {
            //delete image

            File::delete(public_path("uploads/products/" . $product->image));
        }

        

        $product->delete();

        return redirect()->route("products.index")->with("success", "Product deleted successfully.");

    }
}
