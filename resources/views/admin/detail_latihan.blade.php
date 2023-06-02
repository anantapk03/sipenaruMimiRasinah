@extends('layout.admin')
@section('content')
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>  Data Detail Latihan
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <center>
                                            <img src="{{asset('fotoadmin/'.$data->image)}}" alt="" class="img-thumbnail" style="width:70% "> <br> <br>
                                            <p>{{$data->nama}}</p>
                                        </center>
                                    </div>
                                    <div class="col col-lg-8">
                                        <h3 class="card-tittle"> <b>{{$data->nama_latihan}}</b> </h3>
                                        <p> {{$data->deskripsi_latihan}} </p> <br> <br>

                                        <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Pendaftaran</h5>
                                        <p> {{\Carbon\Carbon::parse($data->mulai_pendaftaran)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($data->selesai_pendaftaran)->format(' D, d M Y')}} </p>

                                        <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Latihan</h5>
                                        <p> {{\Carbon\Carbon::parse($data->mulai_latihan)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($data->selesai_latihan)->format(' D, d M Y')}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            </div>
        </div>
        <!-- /.content-header -->
@endsection