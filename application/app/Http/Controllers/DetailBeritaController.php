<?php

namespace App\Http\Controllers;


use DB;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\MasterSKPD;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Http\Controllers\Controller;

class DetailBeritaController extends Controller
{


  public function show($id, $id_berita)
  {
    // SET VIEW COUNTER //
    $set = Berita::find($id_berita);
    if ($set->view_counter=="") {
      $set->view_counter = 1;
    } else {
      $set->view_counter = $set->view_counter+1;
    }
    $set->save();

    $getkategoridrdoomels = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id')
      ->where('kategori_berita.flag_utama', 1)
      ->get();
    
    $getkategoriartikel = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id')
      ->where('kategori_berita.flag_utama', 2)
      ->get();

    $getkategoribagiilmu = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id')
      ->where('kategori_berita.flag_utama', 6)
      ->get();

    $getprofiledoomels = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id')
      ->where('kategori_berita.flag_utama', 0)
      ->get();

    $getberitaterbaru = Berita::select('*')
    ->leftJoin('users', 'users.id', '=', 'berita.id_user')
    ->leftJoin('kategori_berita', 'berita.id_kategori','=','kategori_berita.id')
    ->select('*', 'berita.id','berita.url_foto','kategori_berita.id as id_kategori')
    ->where('flag_publish', 1)
    ->limit(5)
    ->orderby('berita.updated_at', 'desc')
    ->get();

    $getberitaterkait = Berita::select('*')
    ->leftJoin('users', 'users.id', '=', 'berita.id_user')
    ->leftJoin('kategori_berita', 'berita.id_kategori','=','kategori_berita.id')
    ->select('*', 'berita.id','berita.url_foto','kategori_berita.id as id_kategori')
    ->where('id_kategori', $id)
    ->where('flag_publish', 1)
    ->limit(5)
    ->orderby(DB::raw('rand()'))
    ->get();

    $getberitapopuler = Berita::select('*')
    ->leftJoin('users', 'users.id', '=', 'berita.id_user')
    ->leftJoin('kategori_berita', 'berita.id_kategori','=','kategori_berita.id')
    ->select('*', 'berita.id','berita.url_foto','kategori_berita.id as id_kategori')
    ->where('flag_publish', 1)
    ->limit(5)
    ->orderby('view_counter', 'desc')
    ->get();

    $getjumlahkategori = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select('id_kategori', DB::raw('count(*) as jumlah'),'kategori_berita.nama_kategori')
      ->where('flag_publish', 1)
      ->groupby('id_kategori')
      ->orderby('jumlah', 'desc')
      ->get();

    $getdata = Berita::select('*','berita.updated_at as tanggal_posting', 'berita.url_foto as foto_berita')
    ->leftJoin('kategori_berita', 'berita.id_kategori','=','kategori_berita.id')
    ->leftJoin('users', 'berita.id_user','=','users.id')
    ->where('berita.id', $id_berita)->first();

    return view('frontend.pages.detailberita',compact('getkategoridrdoomels', 'getkategoriartikel', 'getkategoribagiilmu','getprofiledoomels','getberitaterbaru','getberitapopuler','getjumlahkategori','getberitaterkait','getdata'));

  }

}
