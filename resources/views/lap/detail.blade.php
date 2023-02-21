@extends('layouts.master');
@section('title')
    Official report - detail
@endsection

@section('content')
    

<section class="content">
    <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Official Report Detail</h6>
                  </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <table class="table table-striped">

                        <tr>
                            <td style="width:20%">Instasi</td>
                            <td>{{ $data->instansi}}</td>
                        </tr>
                       
                         <tr>
                          <td> Alamat</td>
                          <td>{{ $data->address}}</td>
                        </tr>
                        
                       <tr>
                          <td> Client</td>
                          <td>{{ $data->client}}</td>
                        </tr>
                 
                        <tr>
                          <td>Jabatan</td>
                         <td>{{ $data->position}}</td>
                      </tr>  
                        <tr>
                          <td>Waktu</td>
                         <td>{{ $data->time}}</td>
                      </tr>  
                        <tr>
                          <td>Jarak</td>
                         <td>{{ $data->distance}}</td>
                      </tr>  
                      <tr>
                          <td>Kendaraan</td>
                          <td>{{ $data->vehicle}}</td>
                      </tr>
                      <tr>
                          <td>Catatan</td>
                          <td>{{ $data->notes }}</td>
                      </tr>
                      <tr>
                        <td>Gambar</td>
                        <td>
                          @foreach ($data->pictures as $picture)
                          <img src="{{ asset('uploads/lapangan/'.$picture->image) }}" style="width: 150px; margin-right: 20px">
                          @endforeach
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="{{ route('export_pdf', $data->id) }}" class="btn btn-sm btn-primary">Export</a>
                      </td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection