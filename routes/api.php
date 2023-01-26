<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;










Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

   

});


Route::post("register", [AuthController::class, 'signUp']);
Route::post("login", [AuthController::class, 'signIn']);
Route::post("logout", [AuthController::class, 'logout']);
Route::post("new", [ProductController::class, "create"]);
Route::put("product/{id}", [ProductController::class, "update"]);
Route::delete("delete/{id}", [ProductController::class, "destroy"]);



Route::get("products", [ProductController::class, "index"]);
Route::get("product/{id}", [ProductController::class, "show"]);
