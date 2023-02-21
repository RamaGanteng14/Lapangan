@extends('layouts.master')
@section('title')
    User - Add
@endsection

@section('content') 
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Add</h6>
  </div>
  <div class="card-body">
    <form action="add-user" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id= "name" class=" form-control" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Eamil" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="number" class="form-control" id="phone" name="phone" required >
        </div>
        <div class="form-group">
            <label for="password">Password*</label>
          <input type="password" class="form-control" id="password" name="password" palcehoder="Password" required >
        </div>
        <div class="form-group">
            <label for="addres">Address</label>
            <textarea name="address" id="address" cols="30" rows="4" class="form-control" required></textarea>
            
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