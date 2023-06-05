@extends('layout.petugas')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Konfirmasi Pendaftaran Latihan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/petugas/updatekonfirmasipembayaran/{{$data->id_daftar}}" method="POST" enctype="multipart/form-data">
              @csrf 
              <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Konfirmasi</label>
                            <select name="status" id="" class="form-control">
                                <option value="Menunggu">Menunggu</option>
                                <option value="Tolak">Tolak</option>
                                <option value="Dikonfirmasi">Dikonfirmasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col col-lg-7">
                        <center>
                            <img src="{{asset('buktipembayaran/'.$data->konfirmasi_pembayaran)}}" alt="" class="img-thumbnail w-25">
                        </center>
                    </div>
                </div>
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