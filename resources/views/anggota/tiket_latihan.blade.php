@extends('layout.anggota')
@section ('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="content-header">
               <h2> Akses Tiket Latihan Kamu </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <center>
                                @if ($data->level == 'admin')
                                <img src="{{asset('fotoadmin/'.$data->image)}}" alt="" class="img-thumbnail" style="width:50% "> <br> <br>
                                @else
                                <img src="{{asset('fotopetugassanggar/'.$data->image)}}" alt="" class="img-thumbnail" style="width:50% "> <br> <br>
                                @endif
                                <h5 style="font-family: 'Times New Roman', Times, serifs">{{$data->nama}}</h5>
                            </center>
                        </div>
                        <div class="col col-lg-8">
                            <h3 class="card-tittle"> <b>{{$data->nama_latihan}}</b> </h3>
                            <p> {{$data->deskripsi_latihan}} </p> <br>
                            <p>
                               NAMA            : {{auth()->user()->nama}} <br>
                               ID PENDAFTARAN  : {{$data2->id_daftar}}
                            </p> <br>

                            <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Latihan</h5>
                            <p> {{\Carbon\Carbon::parse($data->mulai_latihan)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($data->selesai_latihan)->format(' D, d M Y')}} </p>
                            <p>Rp.{{$data->harga_latihan}},00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection