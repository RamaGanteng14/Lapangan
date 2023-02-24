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
        LAPANGAN BERITA ACARA
        <br>
        <small>Jalan Yos Sudarso, Bejen, Karanganyar</small>
        </span>
      </p>
    </tr>
  </table>
<hr class="line-title">
<P align="center">
  <b>Laporan Berita Acara<b>
</P>
<table align="center" cellpadding="5" width="500">
  <tr>
    <td>Instansi </td>
    <td>: {{ $data->instansi}}</td>
  </tr>
  <tr>
    <td>Alamat Instansi </td>
    <td>: {{ $data->address}}</td>
  </tr>
  <tr>
    <td>Client </td>
    <td>: {{ $data->client}}</td>
  </tr>
  <tr>
    <td>Jabatan </td>
    <td>: {{ $data->position}}</td>
  </tr>
  <tr>
    <td>Waktu </td>
    <td>: {{ $data->time}}</td>
  </tr>
  <tr>
    <td>Jarak </td>
    <td>: {{ $data->distance}}</td>
  </tr>
  <tr>
    <td>Kendaraan </td>
    <td>: {{ $data->vehicle}}</td>
  </tr>
  <tr>
    <td>Catatan</td>
    <td>: {{ $data->notes}}</td>
  </tr>
</table>

                {{-- <p>Instansi: {{ $data->instansi}}</p>
               
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
                    @endforeach --}}
  </body>
</html>
