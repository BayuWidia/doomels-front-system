<?php

namespace App\Http\Controllers;


use DB;
use App\Models\Berita;
use App\Http\Requests;
use App\Models\MasterSKPD;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Http\Controllers\Controller;

class ListBeritaController extends Controller
{

  public function show($id)
  {
    // NAVBAR //
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

    // KONTEN //
    $getdata = DB::table('kategori_berita')
          ->leftJoin('berita', 'kategori_berita.id','=','berita.id_kategori')
          ->join('users', 'berita.id_user','=','users.id')
          ->select('*', 'kategori_berita.id',  'berita.id as id_berita', 'berita.updated_at as tanggal_posting', 'berita.url_foto as foto_berita')
          ->where('kategori_berita.id', $id)
          ->where('berita.flag_publish', '1')
          ->orderBy('berita.updated_at', 'desc')
          ->paginate(10);

      return view('frontend.pages.listberita', compact('getkategoridrdoomels', 'getkategoriartikel', 'getkategoribagiilmu','getprofiledoomels','getberitaterbaru','getberitapopuler','getjumlahkategori','getberitaterkait','getdata'));
    
  }
  
}
