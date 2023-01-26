<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Product;
use App\Http\Resources\Products;
use Illuminate\Support\Facades\Validator as Validator;

class ProductController extends BaseController
{

    public function index()
    {
        $products = Product::all();
        return $this->sendResponse(Products::collection($products), "Sikerült lekérdezni az adatokat");
    }


    public function create(Request $request)
    {
        $product = $request->all();
        $validator = Validator::make($product, [
            "name" => "required",
            "price" => "required",
            "itemNumber" => "required",
        ], [
            "name.required" => "Név kitöltése kötelező",
            "price.required" => "Ár mező kitöltése kötelező",
            "itemNumber.required" => "Darabaszám mező kitöltése kötelező",
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator, "Hiba");
        }
        $product = Product::create($product);

        return $this->sendResponse(new Products($product), "Siker");  //prodacts = resource
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->sendError("Termék nem létezik");
        }

        return $this->sendResponse(new Products($product), "üzenet");
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
