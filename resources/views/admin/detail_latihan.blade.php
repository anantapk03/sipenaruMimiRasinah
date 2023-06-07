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
                                            @if ($data->level = 'admin')
                                            <img src="{{asset('fotoadmin/'.$data->image)}}" alt="" class="img-thumbnail" style="width:70% "> <br> <br>
                                            @else
                                            <img src="{{asset('fotopetugassanggar/'.$data->image)}}" alt="" class="img-thumbnail" style="width:70% "> <br> <br>
                                            @endif
                                            <!--<h5 style="font-family: 'Times New Roman', Times, serifs"></h5>-->
                                        </center>
                                    </div>
                                    <div class="col col-lg-8">
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
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Pendaftar</h4>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Pendaftaran</th>
                                            <th>Nama Anggota</th>
                                            <th>Status</th>
                                            <th >Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($data2 as $row)
                                      <center>
                                        <tr>
                                            <td style="width: 10px">{{$row->id_daftar}}</td>
                                            <td>{{$row->nama}}</td>
                                            <td>
                                                @if($row->status != 'Dikonfirmasi')
                                                @if($row->status == 'Menunggu')
                                                <div class="bg-warning w-80">
                                                    <center><b>{{$row->status}}</b></center>
                                                </div>
                                                @elseif($row->status == 'Tolak')
                                                <div class="bg-danger w-80">
                                                    <center><b>{{$row->status}}</b></center>
                                                </div>
                                                @endif
                                                @endif
                                            </td>
                                            <td>
                                              <a href="/admin/detail_datadaftar/{{$row->id_daftar}}" class="btn btn-info btn-sm" data-id="#"><ion-icon name="information-circle-outline"></ion-icon> <!--outline-->Konfirmasi</a>  
                                            </td>
                                          </tr>
                                      </center>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Peserta Latihan</h5>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Pendaftaran</th>
                                            <th>Nama Anggota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($data2 as $row)
                                      @if($row->status == 'Dikonfirmasi')
                                      <center>
                                        <tr>
                                            <td>{{$row->id_daftar}}</td>
                                            <td>{{$row->nama}}</td>
                                          </tr>
                                      </center>
                                      @endif
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            </div>
        </div>
        <!-- /.content-header -->
@endsection