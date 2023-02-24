<!DOCTYPE html>
<html>
  <head>
    <title>Official Report</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        text-align: left;
        padding: 8px;
      }
      
      tr:nth-child(even){background-color: #f2f2f2}
      
      th {
        background-color: #04AA6D;
        color: white;
      }
      h1 {
          text-align: center;
      }
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
          <br>
          <br>
            <table class="table table-striped">
              <thead>
              <tr>
                <th>Instansi</th>
                <th>Alamat</th>
                <th>Client</th>
                <th>Waktu</th>
                <th>Jarak</th>
                <th>Kendaraan</th>
{{--     
                <th>Gambar</th> --}}
              </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
            <tr>
              <td>{{ $report->instansi}}</td>
              <td>{{ $report->address}}</td>
              <td>{{ $report->client}}</td>
              <td>{{ $report->time}}</td>
              <td>{{ $report->distance}}</td>
              <td>{{ $report->vehicle}}</td>
{{--             
              <td>
                @foreach ($pictures[$report->id] as $picture)
                <img src="data:image/png;base64,{{ $picture }}" style="width: 70px; margin-right: 20px">
                @endforeach
              </td> --}}
            </tr>
            @endforeach
          </tbody>

            </table>
  </body>
</html>