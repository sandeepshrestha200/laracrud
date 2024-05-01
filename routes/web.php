<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get("/products", [ProductController::class, "index"])->name("products.index");
// Route::get("/products/create", [ProductController::class, "create"])->name("products.create");
// Route::post("/products", [ProductController::class, "store"])->name("products.store");
// Route::get("/products/{product}/edit", [ProductController::class, "edit"])->name("products.edit");
// Route::put("/products/{product}", [ProductController::class, "update"])->name("products.update");
// Route::delete("/products/{product}", [ProductController::class, "destroy"])->name("products.delete");

Route::get("/", [ProductController::class, "index"])->name("products.index");
Route::controller(ProductController::class)->prefix("/products")->group(function () {
    // Route::get("/","index")->name("products.index");
    Route::get("/create", "create")->name("products.create");
    Route::post("/","store")->name("products.store");
    Route::get("/{product}/edit", "edit")->name("products.edit");
    Route::put("/{product}","update")->name("products.update");
    Route::delete("/{product}","destroy")->name("products.delete");
});
