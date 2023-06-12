<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    //
    function mengelola_artikel(){
        $data = DB::table('artikels')->get();
        $title ="| Mengelola Artikel";
        return view('admin.mengelola_artikel', compact('data','title'));
    }
    function form_addartikel(){

        $title="Admin | Tambah Data Artikel";
        return view('admin.form_addartikel', ['title'=>$title]);
    }

    function add_artikel(Request $request){
        $data=new Artikel(); 
        $data->judul = $request -> judul;
        $data->preview = $request->preview;
        $data->isi_artikel = $request ->isi_artikel;
        $data->id = auth()->user()->id;
        $data->image_artikel = $request ->image_artikel;
 
        if($request->hasFile('image')){
            $request->file('image_artikel')->move('fotoartikel/', $request->file('image_artikel')->getClientOriginalName());
            $data->image_artikel=$request->file('image_artikel')->getClientOriginalName();
            $data->save();
        } else{
            $data->save();
        }
        return redirect('admin/mengelola_artikel')->with('success', 'Data Berhasil ditambahkan');
    }

}
