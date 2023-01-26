<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;










Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("new", [ProductController::class, "create"]);
Route::get("products", [ProductController::class, "index"]);
Route::get("product/{id}", [ProductController::class, "show"]);
Route::put("product/{id}", [ProductController::class, "update"]);
