<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employees;
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
Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::get('/user',function (Request $request)
    {
        return $request->user();
    });

    //Route::get('/employees/{empl}',[Employees::class,'show']);
    //Route::get('/employees',[Employees::class,'index']);
    Route::apiResource('/employees',Employees::class);

});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::get('/test',function(Request $request){
        return 'Authenticated';
});*/
/*Route::middleware('auth:api')->get('/user',function (Request $request)
{
    return $request->user();
});*/


//Route::get('/employees/{empl}',[Employees::class,'show']);