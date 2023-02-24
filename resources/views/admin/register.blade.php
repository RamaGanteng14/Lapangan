<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .main{
        height: 150vh;
        box-sizing: border-box;
      }
      .register-box{
        width: 500px;
        border: solid 1px;
        padding: 30px;

      }
</style>
<body>
   <div class="main d-flex flex-column justify-content-center align-items-center">
        @if ($errors->any())
        <div class="alert alert-danger" style="width: 500px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
          <div class="alert alert-success" style="width 400vh">
            {{session('message')}}
          </div>
    @endif
        <div class="register-box">
          <h1 class="text-center">Registrasi User</h1>
            <form action="register" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="name" id="name" class="form-control" >
                  </div>
                  <div>
                      <label for="email"  class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" class="form-control">
                  </div>
                  <div>
                    <label for="password" class="form-label mt-3">Password</label>
                    <input type="password" name="password" id="password" class="form-control" >
                  </div>
                  <div>
                    <label for="phone" class="form-label mt-3">Telpon</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                  </div>
                  <div>
                    <label for="address" class="form-label mt-3">Alamat</label>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="5" required></textarea> 
                  </div>
                  <div>
                    <button type="submit" class="btn btn-success form-control mt-3">Registrasi</button>
                  </div>
                  <div class="text-center">
                    Have account?<a href="login"> Login</a>
                  </div>
            </form>
        </div>
   </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>