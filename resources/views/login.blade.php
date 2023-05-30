<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Sanggar Tari Topeng Mimi Rasinah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="{{url('assets/logo_sanggartari.png')}}" type="image/x-icon">
</head>
<body style="background-image: url(assets/dashboard_2.jpg)">
    <div class="row">
      <div class="col-md-6 offset-md-3" >
        <div class="card my-5" >
          @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>                      
                  @endforeach
                </ul>
              </div>
          @endif
          <form class="card-body cardbody-color p-lg-5" method="post" action="proses_login">
              {{ csrf_field() }}
              <div class="text-center">
                <a href="/"><img src="{{"assets/logo_sanggartari.png"}}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                  width="200px" alt="profile"></a>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                  placeholder="Masukan alamat email anda">
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="password" name="password">
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary px-5 mb-5 sm-3">Masuk</button></div>
              <div id="emailHelp" class="form-text text-center mb-5 text-dark">Belum memiliki akun? <a href="{{'/register'}}" class="text-dark fw-bold">Daftar</a>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>