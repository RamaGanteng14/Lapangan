<!DOCTYPE html>
<html>
  <head>
    <title>Official Report</title>
    <style>
    .line-title{
      border: 0;
      border-style: unset;
      border-top: 1px solid #000;
    }
  </style>
</head>
<body>
  <table style="width: 100%;">
    <tr>
      <p align="center">
        <span style="line-height: 1.6; font-weight: bold;">
        LAPORAN BERITA ACARA
        </span>
      </p>
    </tr>
  </table>
<hr class="line-title">


                <p>Instansi: {{ $data->instansi}}</p>
               
                  <p>Alamat : {{ $data->address}}</p>
                 
               
                  <p>Client : {{ $data->client}}</p>
 
                  <p>Jabatan : {{ $data->position }}</p>
              
                  <p>Waktu : {{ $data->time}}</p>
            
                  <p>Jarak : {{ $data->distance}}</p>
                
                  <p>Kendaraan : {{ $data->vehicle }}</p>
             
                  <p>Catatan : {{ $data->notes}}</p>
              
                  <p>Gambar : </p>
                    @foreach ($pictures as $picture)
                    <img src="data:image/png;base64,{{ $picture }}" style="width: 300px; margin-right: 20px">
                    @endforeach
  </body>
</html>
