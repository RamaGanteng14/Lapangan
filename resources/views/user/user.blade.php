@extends('layouts.master');
@section('title')
    User
@endsection
@section('content')
        <div class="container-fluid">
            <div class="card-shadow-mb-4">
                <div class="card-header-py3">
                    <h3 class="m-0-font-weight-bold-text-primary">User</h3>
                </div>
                <div class="card-body">
                    
                    <div class="mt-5">
                        @if (session('status'))
                          <div class="alert alert-success">
                             {{ session('status') }}
                          </div>
                       @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                               
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->phone}}</td>
                                    <td>{{ $item->email}}</td>
                                    <td>{{ $item->address}}</td>
                                   
                                    <td>
                                     @if ($item->status == 'inactive')
                                        <a href="/user-approve/{{$item->id}}" class="btn btn-primary">Approve</a>
                                        @endif
                                        <a href="user-delete/{{ $item->id }}"  class="btn btn-danger" data-czonfirm="Are you sure delete this user? ">Delete</a>
                                    </td>
                                </tr>
                                     
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection