@extends('layout.tamu')
@section('content')
<br><br>
<!--Content-->
<div class="container-fluid mt-5">
  <div class="row mb-3">
    <div class="col mt-2">
      <img src="{{url('assets/daftar_2.jpg')}}" alt="" class="img img-fluid">
    </div>
    <div class="col">
      <div class="card">
        <div class="card-header">
          <center><h4 style="font-family: 'Times New Roman', Times, serif"> DAFTAR SEBAGAI ANGGOTA</h4></center>
        </div>
        <div class="card-body">
          <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
              <label>Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap Anda">
              <label for="inpuImg">Masukan foto 4X6</label>
              <input type="file" name="image" id="inputImg" class="form-control">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Alamat Email anda">
            <label>Nomor Whatsapp</label>
            <input type="number" name="no_wa" id="no_wa" class="form-control" placeholder="Masukan Nomor Whatsapp Anda" onkeypress="return hanyaAngka(event)">
            <label>Alamat</label>
            <textarea type="text" name="alamat" id="no_wa" class="form-control" placeholder="Masukan Alamat Lengkap Anda"> </textarea>
            <label for="inputPw">Kata Sandi</label>
            <input type="text" name="password" id="InputPW" class="form-control">
            <br><center><button type="submit" class="btn btn-primary w-25" >Daftar</button></center>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection