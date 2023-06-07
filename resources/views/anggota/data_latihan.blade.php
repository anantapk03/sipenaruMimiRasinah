@extends('layout.anggota')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <H1>Data Latihan</H1> <br>
            @foreach($data as $row)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <center>
                                @if ($row->level = 'admin')
                                <img src="{{asset('fotoadmin/'.$row->image)}}" alt="" class="img-thumbnail" style="width:50% "> <br> <br>
                                @else
                                <img src="{{asset('fotopetugassanggar/'.$row->image)}}" alt="" class="img-thumbnail" style="width:50% "> <br> <br>
                                @endif
                                <!--<h5 style="font-family: 'Times New Roman', Times, serifs"></h5>-->
                            </center>

                        </div>
                        <div class="col col-lg-9">
                                <h4 class="card-tittle"> <b>{{$row->nama_latihan}}</b> </h4>
                                <p> {{$row->deskripsi_latihan}} </p> <br> <br>

                                {{-- <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Pendaftaran</h5>
                                <p> {{\Carbon\Carbon::parse($row->mulai_pendaftaran)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($row->selesai_pendaftaran)->format(' D, d M Y')}} </p>

                                <h5><ion-icon name="stopwatch-outline"></ion-icon>Waktu Latihan</h5>
                                <p> {{\Carbon\Carbon::parse($row->mulai_latihan)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($row->selesai_latihan)->format(' D, d M Y')}} </p>
                                <p>Rp.{{$row->harga_latihan}},00</p> --}}
                                @if ($date_now < $row->selesai_pendaftaran)
                                <a href="#" class="btn btn-primary btn-block">Daftar Latihan</a>
                                @endif
                                @if($date_now > $row->selesai_pendaftaran)
                                <a href="#" class="btn btn-danger btn-block disabled" role="button" aria-disabled="true">Pendaftaran Ditutup</a>
                                @endif
                        </div>
                        {{-- @if ($date_now < $row->selesai_pendaftaran)
                        <a href="#" class="btn btn-primary btn-block">Daftar Latihan</a>
                    @endif
                    @if($date_now > $row->selesai_pendaftaran)
                    <a href="#" class="btn btn-danger btn-block disabled" role="button" aria-disabled="true">Pendaftaran Ditutup</a>
                    @endif --}}
                    </div>
                   
                </div>
            </div>
            @endforeach
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content-header -->
    
@endsection