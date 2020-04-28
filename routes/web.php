<?php

use Illuminate\Support\Facades\Route;
use App\Questions;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.create');
});


Route::post('/create',"RegisterController@create");
Route::get('/game',function(){
    $questions = Questions::all();
    foreach ($questions as $value) {
        $value->options = json_decode($value->options);
    }
    return view('pages.game',['questions'=>$questions]);
});


Route::post('/test',function(Request $request){
    print_r($_POST);
});