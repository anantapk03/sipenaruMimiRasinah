@extends('layout.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Latihan Tari Topeng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/admin/add_artikel/post" method="POST" enctype="multipart/form-data">
              @csrf 
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Artikel</label>
                    <input type="text" class="form-control" id="nama" placeholder="Judul Artikel" name="judul">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Preview</label>
                  <input type="text" name="preview" class="form-control" id="email" placeholder="Preview Artikel">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Isi Artikel</label>
                    
                    <textarea type="text-area" name="isi_artikel" class="form-control" id="no_wa" placeholder="Isi Artikel"></textarea>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar Artikel</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="image_artikel">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
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
@endsection