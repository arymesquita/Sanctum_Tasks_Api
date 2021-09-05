<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

#Route:group(['prefix'=>'v1','as'=>'api.','namespace'=>'Api\V1\Admin','middleware'=>['auth:sanctum']], function())



//Auth
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

//Protected routes
Route::middleware('auth:sanctum')->group(function () {

    Route::get('user',[AuthController::class,'user']);
    Route::post('logout',[AuthController::class,'logout']);

    Route::get('/users',[UserController::class,'index']);
    Route::post('/users/{user}/todos',[UserController::class,'storeTodo']);


    //User
	Route::get('/users',[UserController::class,'index']);
	Route::get('/users/{user}',[UserController::class,'show']);
	Route::post('/users/{user}/todos',[UserController::class,'storeTodo']);


	//Todo
	Route::put('/todos/{todo}/done',[TodoController::class,'markAsDone']);
	Route::put('/todos/{todo}/undone',[TodoController::class,'markAsUnDone']);
	Route::put('/todos/{todo}',[TodoController::class,'update']);
	Route::delete('/todos/{todo}',[TodoController::class,'destroy']);



});
