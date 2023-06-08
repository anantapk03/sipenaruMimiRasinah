@extends('layout.anggota')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Latihan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <center>
                                    <img src="{{asset('fotoadmin/'.$data->image)}}" alt="" class="img-thumbnail" style="width:70% "> <br> <br>
                                    <!--<h5 style="font-family: 'Times New Roman', Times, serifs"></h5>-->
                                    </center>
                                    </div>
                            <div class="col">
                                <h3 class="card-tittle"> <b>{{$data->nama_latihan}}</b> </h3>
                                <p> {{$data->deskripsi_latihan}} </p> <br> <br>
        
                                <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Pendaftaran</h5>
                                <p> {{\Carbon\Carbon::parse($data->mulai_pendaftaran)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($data->selesai_pendaftaran)->format(' D, d M Y')}} </p>
        
                                <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Latihan</h5>
                                <p> {{\Carbon\Carbon::parse($data->mulai_latihan)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($data->selesai_latihan)->format(' D, d M Y')}} </p>
                                <p>Rp.{{$data->harga_latihan}},00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <form action="/anggota/data_latihan/postdaftar_latihan/{{$data->id_latihan}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputFile">Bukti Pembayaran</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="gambar" name="konfirmasi_pembayaran">
                                  <label class="custom-file-label" for="exampleInputFile">Masukan Gambar Bukti Pembayaran</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                            </div>
                            </div>
                          <!-- /.card-body -->
                    
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection