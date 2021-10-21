<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PassportAuthController;

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

Route::middleware('auth:api')->group(function(){
    Route::get('user',[PassportAuthController::class, 'auth_user'] );
});

//index
Route::get('movies', [MovieController::class, 'index']);
//show
Route::get('movies/{movie}', [MovieController::class, 'show']);

Route::post('movies/create', [MovieController::class, 'store' ]);


Route::delete('movies/{movie}', [MovieController::class, 'destroy' ]);


Route::put('movies/{movie}', [MovieController::class, 'update' ]);



//passport routes 
//reg
Route::post('register', [PassportAuthController::class, 'register']);

//log
Route::post('login', [PassportAuthController::class, 'login']);



//movies routes

// Route::middleware('auth:api')->group(function(){
// });


//get all movies




