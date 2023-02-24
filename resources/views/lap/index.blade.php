@extends('layouts.master');
@section('title')
    Lapangan
@endsection
@section('content')
        <div class="container-fluid">
            <div class="card-shadow-mb-4">
                <div class="card-header-py3">
                    <h4 class="m-0-font-weight-bold-text-primary">Berita Acara</h4>
                </div>
                <div class="row justify-content-end">
                    <div class="my-3 col-12 col-sm-8 col-md-3 j">
                    <form action="" method="GET">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" id="inputPassword6" name="search">
                        <button class="input-group-text btn btn-primary"><i class="fas fa-search"></i></button>
                      </div>
                    </form>
                   </div>
                 
                </div>
                <div class="card-body">
                    <div class="row-justify-content-end mx-3-mb-2">
                        <a href="add-official" class="btn btn-primary "><i class="fas fa-plus"></i> Tambah</a>
                        <a href="cetak-form" class="btn btn-success px-3"><i class="fas fa-file-pdf"></i> Cetak</a>
                    </div>
                    <div class="mt-5">
                        @if (session('success'))
                          <div class="alert alert-success">
                             {{ session('success') }}
                          </div>
                       @endif
                      </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr> 
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Instansi</th>
                                    <th>Client</th>
                                    <th>Time</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($official as $item)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $item->users->name}}</td>
                                    {{-- <td>{{ $item->users->id\\\}}</td> --}}
                                    <td>{{ $item->instansi}}</td>
                                    <td>{{ $item->client}}</td>
                                    <td>{{ $item->time}}</td>
                                    <td>{{ $item->address}}</td>
                                    <td>
                                        <a href="official-edit/{{ $item->id}}">Edit</a> |
                                        <a href="official-detail/{{ $item->id}}">Detail</a> |
                                        <a href="official-delete/{{ $item->id}}" class="delete" data-confirm="Are you sure to delete this data?">Delete</a>
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