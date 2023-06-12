@extends('layout.anggota')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data Anggota Sanggar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/anggota/edit_passanggota/{{$data->id}}" method="POST" enctype="multipart/form-data">
              @csrf 
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="password" value="{{$data->password}}" name="password" class="form-control" id="email" placeholder="Ubah Kata Sandi">
                </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div><!-- /.container-fluid -->
    </div>
    </div>
</div>    
@endsection