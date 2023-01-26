<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Product;
use App\Http\Resources\Products;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return $this->sendResponse(Products::collection($products), "Sikerült lekérdezni az adatokat");
    }


    public function create(Request $request)
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
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
