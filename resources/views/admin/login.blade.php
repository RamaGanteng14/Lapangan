@extends('layouts.header')
@section('title')
Login
@endsection
@section('content')
 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body ">
            <!-- Nested Row within Card Body -->
          
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    @if(Session::has('status'))
                    <div class="alert alert-danger" role="alert">
                      {{Session::get('message')}}
                    </div>
                    @endif
                  </div>

                  <form class="/login" method="POST" action="{{ route('auth') }}">
                    @csrf
                      <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-user" id="username"  placeholder="Username">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>  
                      <div class="text-center">
                        Dont' have account ? <a href="register">Sign Up</a>
                      </div>
                  </form>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>