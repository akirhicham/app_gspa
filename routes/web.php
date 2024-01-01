<?php

use App\Models\Stock;

use Spatie\FlareClient\Api;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\stockController;
use App\Http\Controllers\recipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [stockController::class, 'index']);

Route::get('/add_product', [stockController::class, 'index'])->name('add_product');
Route::post('/create_product', [stockController::class, 'create'])->name('create_product');
Route::get('/products_in_stock', [stockController::class, 'getProductsInStock'])->name('products_in_stock');
Route::get('/get_recipe', [recipeController::class, 'get_recipe'])->name('get_recipe');

Route::post('/validate_recipe', [RecipeController::class, 'validateRecipe'])->name('validate_recipe');
