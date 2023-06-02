@extends('layout.admin')
@section('content')
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="card-title">Data Latihan Sanggar Tari Topeng Mimi Rasinah</h3>
                            </div>
                            <div class="col">
                              <center><a href="/admin/add_latihan" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon>Tambah</a></center>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Got message, kalo datanya berhasil maka bakal muculin message--> 
                        @if ($message=Session::get('success'))
                        <div class="alert alert-success" role="alert">
                          {{$message}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Latihan</th>
                                    <th>Periode Pendaftaran</th>
                                    <th>Periode Latihan</th>
                                    <th style="width: 100px;">Pelatih</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $row)
                              <tr>
                                <td>{{$row->id_latihan}}</td>
                                <td>{{$row->nama_latihan}}</td>  
                                <td> {{\Carbon\Carbon::parse($row->mulai_pendaftaran)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($row->selesai_pendaftaran)->translatedformat(' D, d M Y')}}  </td>
                                <td>{{\Carbon\Carbon::parse($row->mulai_latihan)->format(' D, d M Y')}} - {{\Carbon\Carbon::parse($row->selesai_latihan)->format(' D, d M Y')}} </td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->deskripsi_latihan}}</td>
                                <td>
                                  <a href="/admin/detail_datalatihan/{{$row->id_latihan}}" class="btn btn-info btn-sm" data-id="{{$row->id_latihan}}"><ion-icon name="information-circle-outline"></ion-icon> <!--outline-->Detail</a> 
                                  <a href="/admin/edit_datalatihan/{{$row->id_latihan}}" class="btn btn-warning btn-sm"><ion-icon name="create-outline"></ion-icon>Edit</a>
                                  <a href="#" class="btn btn-danger btn-sm delete_latihan" data-id="{{$row->id_latihan}}"><ion-icon name="trash-outline"></ion-icon> <!--outline-->Hapus</a>
                                  
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            </div>
        </div>
        <!-- /.content-header -->
@endsection