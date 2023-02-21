@extends('layouts.master')
@section('title')
    User - Edit
@endsection

@section('content') 
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Edit</h6>
  </div>
  <div class="card-body">
    <form action="/user-update/{{ $user->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id= "name" class=" form-control"  required placeholder="Name" value="{{ $user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required placeholder="Eamil" value="{{ $user->email}}">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone"  required value="{{ $user->phone}}" >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
          <input type="text" class="form-control" id="password" name="password" required palcehoder="Password"  >
        </div>
        <div class="form-group">
            <label for="addres">Address</label>
            <input type="text" class="form-control" id="address" name="address"  required placeholder="Address" value="{{ $user->address}}">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>    
    </form>
</div>
    </div>
  </div>
  </div>


@endsection