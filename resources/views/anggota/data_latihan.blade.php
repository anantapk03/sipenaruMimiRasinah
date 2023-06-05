@extends('layout.anggota')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @foreach($data as $row)
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title">
                                <h3 class="card-tittle"> <b>{{$row->nama_latihan}}</b> </h3>
                                <p> {{$row->deskripsi_latihan}} </p> <br> <br>

                                <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Pendaftaran</h5>
                                <p> {{\Carbon\Carbon::parse($row->mulai_pendaftaran)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($data->selesai_pendaftaran)->format(' D, d M Y')}} </p>

                                <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Latihan</h5>
                                <p> {{\Carbon\Carbon::parse($row->mulai_latihan)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($data->selesai_latihan)->format(' D, d M Y')}} </p>
                                <p>Rp.{{$row->harga_latihan}},00</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content-header -->
    
@endsection