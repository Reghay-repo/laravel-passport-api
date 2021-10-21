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
    //store
    Route::post('movies', [MovieController::class, 'store' ]);

    //delete
    Route::delete('movies/{movie}', [MovieController::class, 'destroy' ]);

    //update
    Route::put('movies/{movie}', [MovieController::class, 'update' ]);

    //get authenticated user
    Route::get('user',[PassportAuthController::class, 'auth_user'] );
});

//index
Route::get('movies', [MovieController::class, 'index']);

//show
Route::get('movies/{movie}', [MovieController::class, 'show']);



//passport routes 
//register
Route::post('register', [PassportAuthController::class, 'register']);
//login
Route::post('login', [PassportAuthController::class, 'login']);





