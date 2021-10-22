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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//movies group routes + get user authenticated
Route::middleware('auth:api')->group(function(){
    //store
    Route::post('movies', [MovieController::class, 'store' ]);// good

    //delete
    Route::delete('movies/{movie}', [MovieController::class, 'destroy' ]); // good

    //update
    Route::put('movies/{movie}', [MovieController::class, 'update' ]); //good

    //get authenticated user
    Route::get('user',[PassportAuthController::class, 'auth_user'] ); //good
});

//index
Route::get('movies', [MovieController::class, 'index']); //good

//show
Route::get('movies/{movie}', [MovieController::class, 'show']); //good



//passport routes 
//register
Route::post('register', [PassportAuthController::class, 'register']); // good
//login
Route::post('login', [PassportAuthController::class, 'login']); // good





