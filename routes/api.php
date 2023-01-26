<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;










Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

   

});

Route::group(["middleware" => ["auth:sanctum"]], function () {
 
Route::post("logout", [AuthController::class, 'logout']);
Route::post("new", [ProductController::class, "create"]);
Route::put("product/{id}", [ProductController::class, "update"]);
Route::delete("delete/{id}", [ProductController::class, "destroy"]);

});

//nem végett útvonal
Route::post("register", [AuthController::class, 'signUp']);
Route::post("login", [AuthController::class, 'signIn']);


//Termékekkel foglalokzik

Route::get("products", [ProductController::class, "index"]);
Route::get("product/{id}", [ProductController::class, "show"]);
