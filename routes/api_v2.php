<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function(){

    Route::get('/user', function(Request $request){

        $user = $request->user();
        $user->name = 'toto';
        return new \App\Http\Resources\Api\v2\UserResource($user);

    });

});

