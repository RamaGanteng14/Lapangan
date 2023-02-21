@extends('layouts.master')

@section('title')
 Official Raeport Cetak
@endsection

@section('content')  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <section class="content">
      <div class="container-fluid">
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3>Official Report  </h3>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                    <div class="input-group mb">
                        <p><label for="label">Tanggal Awal   : </label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control">
                    {{-- <div class="input-group mb-3"> --}}
                    <div class="col-md-6">
                        <div class="input-group mb">
                        <p><label for="label">Tanggal Akhir   : </label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <a href="" onclick="this.href='/cetak-data-pertanggal/'+document.getElementById('tglawal').value +
                            '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">
                            Cetak   <i class="fas fa-print"></i></a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</body>
</html>

      @endsection