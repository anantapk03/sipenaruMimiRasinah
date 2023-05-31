@extends('layout.admin')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                              <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('fotopetugassanggar/'.auth()->user()->image)}}"
                                     alt="User profile picture">
                              </div>
              
                              <h3 class="profile-username text-center">{{auth()->user()->nama}}</h3>
              
                              <p class="text-muted text-center">Admin</p>
              
                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                  <b>Nama</b> <a class="float-right">{{auth()->user()->nama}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Email</b> <a class="float-right">{{auth()->user()->email}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Alamat</b> <a class="float-right">{{auth()->user()->alamat}}</a>
                                </li>
                              </ul>
                              <a href="#" class="btn btn-primary btn-block"><b>Edit Data</b></a>
                            </div>
                        </div>
                            <!-- /.card-body -->
        </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-header -->
@endsection