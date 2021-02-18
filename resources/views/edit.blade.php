@extends('layout')

@section('content')

    <div class="col-sm-6">
       <h1> Edit Restaurant </h1>

       <form method="POST" action="{{ url('/edit/'.$data->id) }}">

            @csrf


            <div class="form-group">
                <label > Name </label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                 <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="{{ $data->name }}">
            </div>
            <div class="form-group">
                 <label > Email </label>
                 <input type="text" name="email" class="form-control"  placeholder="Enter Email" value="{{ $data->email }}">
            </div>
            <div class="form-group">
                 <label > Address </label>
                 <input type="text" name="address" class="form-control"  placeholder="Enter Address" value="{{ $data->address }}">
            </div>

             <button type="submit" class="btn btn-primary">Edit</button>
       </form>
    </div>

@endsection
