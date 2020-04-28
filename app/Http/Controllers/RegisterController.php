<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
class RegisterController extends Controller
{
    public function create(Request $request){
        print_r($request->getClientIp());


        
    }
    
}
