@extends('layout.petugas')
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
                                <h3 class="card-title">Data Anggota Sanggar Tari Topeng Mimi Rasinah</h3>
                            </div>
                            <div class="col">
                              <center><a href="/petugas/mengelola_anggota/add_data" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon>Tambah</a></center>
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
                                    <th>Email</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Bergabung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $row)
                              <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->email}}</td>  
                                <td>
                                  <img src="{{asset('fotoanggota/'.$row->image)}}" alt="" style="width: 80px">
                                </td>
                                <td> {{$row->nama}} </td>
                                <td>{{$row->alamat}}</td>
                                <td>{{$row->created_at}}</td>
                                <td> 
                                  <a href="#" class="btn btn-warning btn-sm"><ion-icon name="create-outline"></ion-icon>Edit</a>
                                  <a href="#" class="btn btn-danger btn-sm delete_anggota" data-id="{{$row->id}}"><ion-icon name="trash-outline"></ion-icon> <!--outline-->Hapus</a>
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