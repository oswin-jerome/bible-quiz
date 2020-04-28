@extends('layout.app')
 @section('content')
     <div id="create">
         <h1 class="text-center mt-4">Bible Quiz</h1>

         <div class="rules ml-3 mt-4 p-3">
             <h5 class="text-danger">Rules :</h5>
             <ul class="list ml-5">
                 <li>One</li>
                 <li>Two</li>
                 <li>three</li>
             </ul>
         </div>

         <div class="p-3 c-bg">
            <h3 class="text-center mt-3 text-primary">Register</h3>
            {!! Form::open(['action' => 'RegisterController@create',"class"=>"p-3",'method'=>'POST']) !!}
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="number" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                  <label for="church">Church</label>
                  <input type="text" class="form-control" id="church" name="church">
                </div>

                <button type="submit" class="btn btn-primary w-100">Start</button>
            {!! Form::close() !!}
         </div>
     </div>
 @endsection