@extends('layout.petugas')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Latihan Tari Topeng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/petugas/add_latihan/post" method="POST" enctype="multipart/form-data">
              @csrf 
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Latihan</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Latihan" name="nama_latihan">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mulai Pendaftaran</label>
                  <input type="date" name="mulai_pendaftaran" class="form-control" id="email" placeholder="Tanggal Mulai Pendaftaran">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Selesai Pendaftaran</label>
                    <input type="date" name="selesai_pendaftaran" class="form-control" id="no_wa" placeholder="Nomor Selesai Pendaftaran">
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mulai Latihan</label>
                        <input type="date" name="mulai_latihan" class="form-control" id="email" placeholder="Tanggal Mulai Latihan">
                    </div>
                    <div class="form-group">
                          <label for="exampleInputEmail1">Selesai Latihan</label>
                          <input type="date" name="selesai_latihan" class="form-control" id="no_wa" placeholder="Tanggal Selesai Latihan">
                    </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi Latihan</label>
                    <input type="text" name="deskripsi_latihan" class="form-control" placeholder="Nomor Whatsapp Aktif">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pelatih</label>
                    
                    <select name="id_pelatih" id="" class="form-control">
                        @foreach ($data as $row)
                        <option value="{{$row->id}}">{{$row->nama}}</option>
                        @endforeach
                    </select>
                    
                </div>
                </div>
              <!-- /.card-body -->
        
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div><!-- /.container-fluid -->
    </div>
</div>    
@endsection