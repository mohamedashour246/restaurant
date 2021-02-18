@extends('layout')

@section('content')
    
    <div>  
       <h1> User Register Page </h1>  
       <div class="col-sm-6">
       <form method="POST" action="{{ url('/register') }}">

          @csrf
          <div class="form-group">
            <label > Name </label>
            <input type="text" name="name" class="form-control"  placeholder="Enter Name">
           </div> 
           <div class="form-group">
            <label > Email </label>
            <input type="text" name="email" class="form-control"  placeholder="Enter Email">
           </div> 
           <div class="form-group">
            <label > Password </label>
            <input type="password" name="password" class="form-control"  placeholder="Enter Password">
           </div> 
           

           <button type="submit" class="btn btn-primary">Submit</button>
       </form> 

       </div>
       
       
    </div> 
    
@endsection