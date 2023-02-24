@extends('layouts.master')
@section('title')
    Official Report - Add
@endsection

@section('content') 
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Berita Acara</h6>
  </div>
  <div class="card-body">
    <form action="add-official" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              @foreach ($data as $item)
            <input type="hidden" value="{{$item->id}}" name="user_id">
              @endforeach
              <label for="instansi">Instansi</label>
              <input type="text" name="instansi" id="instansi" class="form-control">
            </div>
            <div class="form-group">
              <label for="client">Client</label>
              <input type="text" class="form-control" id="client" name="client" palcehoder="client" >
            </div>
            <div class="form-group">
              <label for="addres">Alamat Instansi</label>
              <textarea name="address" id="address" cols="30" rows="4" class="form-control"></textarea>
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">

            <!-- /.form-group -->
            <div class="form-group">
              <label for="position">Jabatan</label>
              <input type="text" class="form-control" id="position" name="position" >
            </div>
            <div class="form-group">
              <label for="time">Tanggal & Jam</label>
              <input type="datetime-local" class="form-control" id="time" name="time" >
            </div>

            <div class="form-group">
              <label for="distance">Jarak</label>
              <input type="text" class="form-control" id="distance" name="distance" placeholder="" >
              <small style="color: red;">Jarak dari kantor ke instansi client</small>
            </div>
            <div class="form-group">
              <label for="kendaraan">Kendaraan</label>
              <input type="text" class="form-control" id="vehicle" name="vehicle" >
            </div>
            {{-- <div class="form-group">
              <label for="upload_file">Pilih Gambar*</label>
              <input type="file" name="files[]" class="form-control" id="upload_filxe" multiple required>
            </div> --}}
            <div class="form-group">
              <label for="upload_file">File Input*</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="files[]" class="custom-file-input" id="upload_file" multiple required>
                  <label class="custom-file-label" for="upload_file">Pilih Gambar</label>
                  <small style="color: red;"></small>
                </div>
              </div>
            </div>
           
        </div>
        </div>
        </div>
          <div class="form-group">
            <label for="notes">Catatan </label>
            <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"></textarea>
          </div>
         
          {{-- <div class="form-group">
            
              <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"></textarea>
          </div> --}}
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="reset" class="btn btn-md btn-warning">Reset</button>
         </div>
      </div>
          </form>
  </div>
    </div>
  </div>
  </div>
  <script>
    var loadFile = function(event)
    {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
    };


  </script>
@endsection

@push('script')
  <script>
    $('#upload_file').on('change', function() {
  //get all image files
  var files = $(this)[0].files;
  //check file length
  if (files.length > 0) {
    $('#image-preview-container').html('');
    var index = 0;
    var total_file_size = 0;
    //loop through all files
    $.each(files, function(i, file) {
      //add to total size
      total_file_size = total_file_size + file.size;
      //make sure file is image
      if (file.type.match(/image.*/)) {
        // initialize file reader
        var reader = new FileReader();
        //image loaded
        reader.onload = function(e) {
          //create image element
          var img = $('<img/>');
          console.log(img);
          img.attr('src', e.target.result);
          img.attr('class', 'img-fluid mr-2');
          //set styling properties, height 100px and width auto
          img.css('height', '100px');
          img.css('width', 'auto');
          //append image to output element
          $('#image-preview-container').append(img);
        }
        //read the image
        reader.readAsDataURL(file);
      }
    });
  }
});
  </script>
@endpush
