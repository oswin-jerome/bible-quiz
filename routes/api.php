<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Questions;
use App\Registration;
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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/questions',function(){

    $questions = Questions::all();
    foreach ($questions as $value) {
        $value->options = json_decode($value->options);
    }
    return json_encode($questions);
});



Route::get('/checkuser',function(Request $request){

    $reg = Registration::where('ip','=',$request->getClientIp())->get();


    return response()->json($reg);

});


Route::post('/create',function(Request $request){
    
    
    
    $reg = new Registration();
        $reg->ip = $request->getClientIp();
        $reg->name = $request['name'];
        $reg->phone = $request['phone'];
        $reg->church = $request['church'];

        $stat = $reg->save();
        if($stat){

            return response()->json(["message"=>"success","status"=>200]);
        }else{
            return response()->json(["message"=>"failed","status"=>100]);
        }
});


Route::put('/submit',function(Request $request){
    $reg = Registration::where('ip','=',$request->getClientIp())->get();

    if($reg[0]->score !=null){
        return response()->json(["message"=>"You already submitted your answer","status"=>50]);
    }

    $reg[0]->score = $request['score'];
    $reg[0]->time = $request['time'];

    error_log($request->time);

    $stat = $reg[0]->save();
        if($stat){

            return response()->json(["message"=>"success","status"=>200]);
        }else{
            return response()->json(["message"=>"failed","status"=>100]);
        }
});



Route::get('/result',function(Request $request){
    $result = Registration::orderBy('score','asc')->orderBy('time','desc')->get();

    return response()->json($result);
});