@extends('layout.anggota')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="content-header">
            <H1>Data Latihan</H1> <br>
        </div><!-- /.content-header -->
        <div class="row">
            <div class="col">
                @foreach($data as $row)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <center>
                                    @if ($row->level='admin')
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
                                    <a href="/anggota/data_latihan/daftar_latihan/{{$row->id_latihan}}" class="btn btn-primary btn-block">Daftar Latihan</a>
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
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Latihan Kamu</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th>Id Pendaftaran</th>
                                <th>ID Latihan</th>
                                <th>Nama Pelatihan</th>
                                <th>Status</th>
                                <th>Akses Tiket</th>
                            </thead>
                            <tbody>
                                @foreach ($data2 as $row)
                                <tr>
                                    <td>
                                        {{$row->id_daftar}}
                                    </td>
                                    <td>
                                        {{$row->id_latihans}}
                                    </td>
                                    <td>
                                        {{$row->nama_latihan}}
                                    </td>
                                    <td>
                                        @if($row->status == 'Menunggu')
                                        <div class="bg-warning w-80">
                                             <center><b>{{$row->status}}</b></center>
                                        </div>
                                        @elseif($row->status == 'Tolak')
                                        <div class="bg-danger w-80">
                                            <center><b>{{$row->status}}</b></center>
                                        </div>
                                        @else
                                        <div class="bg-success w-80">
                                            <center><b>{{$row->status}}</b></center>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->status == 'Menunggu' || $row->status == 'Tolak')
                                        <a href="#" class="btn btn-success btn-sm disabled" disabled>Akses Tiket</a>
                                        @else
                                        <a href="/anggota/akses_tiketlatihan/{{$row->id_latihans}}/{{$row->id_daftar}}" class="btn btn-success btn-sm">Akses Tiket</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
    
@endsection