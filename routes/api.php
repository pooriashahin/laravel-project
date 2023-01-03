<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listings;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', function () {

    return response()->json([
        'data' => Listings::all()
    ]);
});

Route::post('/register',  [AuthController::class, 'register']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);

//Route::Resource('products', ProductController::class);

//Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/products',  [ProductController::class, 'store']);
    Route::post('/products/{id}',  [ProductController::class, 'update']);
    Route::post('/products/{id}',  [ProductController::class, 'destroy']);
//});

