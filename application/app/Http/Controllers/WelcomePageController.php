<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\Slider;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Aplikasi;

class WelcomePageController extends Controller
{

  public function index()
  {

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

    $getslider = Slider::select('*')
      ->where('flag_slider', 1)
      ->limit(3)
      ->orderby(DB::raw('rand()'))
      ->get();

    $getgaleri = Gallery::select('*')
      ->where('flag_gambar', 1)
      ->limit(4)
      ->orderby(DB::raw('rand()'))
      ->get();
      // dd($getgaleri);
    
    $getberitaberjalan = Berita::select('*')
      ->where('flag_publish', 1)
      ->orderby('updated_at', 'desc')
      ->get();

    $getheadline = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->leftJoin('users', 'users.id', '=', 'berita.id_user')
      ->select('berita.judul_berita', 'berita.id', 'berita.created_at', 
          'berita.url_foto', 'kategori_berita.nama_kategori', 'users.name','berita.tanggal_publish','berita.isi_berita',
          'kategori_berita.id as id_kategori')
      ->where('flag_publish', 1)
      ->where('flag_headline', 1)
      ->orderby('berita.updated_at', 'desc')
      ->limit(4)
      ->get();  

    $getberitaterbaru = Berita::select('*')
      ->leftJoin('users', 'users.id', '=', 'berita.id_user')
      ->leftJoin('kategori_berita', 'berita.id_kategori','=','kategori_berita.id')
      ->select('*', 'berita.id','berita.url_foto','kategori_berita.id as id_kategori')
      ->where('flag_publish', 1)
      ->limit(5)
      ->orderby('berita.updated_at', 'desc')
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

    $getberitabykategoridrdoomels = Berita::leftJoin('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->leftJoin('users', 'users.id', '=', 'berita.id_user')
      ->select('*', 'berita.created_at as tanggal_posting', 'berita.id as id_berita', 'kategori_berita.id as id_kategori',
        'berita.url_foto')
      ->where('flag_utama', 1)
      ->where('flag_publish', 1)
      ->orderby('berita.updated_at', 'desc')
      ->get();

    $getberitabykategoriartikel = Berita::leftJoin('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->leftJoin('users', 'users.id', '=', 'berita.id_user')
      ->select('*', 'berita.created_at as tanggal_posting', 'berita.id as id_berita', 'kategori_berita.id as id_kategori',
        'berita.url_foto')
      ->where('flag_utama', 2)
      ->where('flag_publish', 1)
      ->orderby('berita.updated_at', 'desc')
      ->get();

    $getberitabykategoribagiilmu = Berita::leftJoin('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->leftJoin('users', 'users.id', '=', 'berita.id_user')
      ->select('*', 'berita.created_at as tanggal_posting', 'berita.id as id_berita', 'kategori_berita.id as id_kategori',
        'berita.url_foto')
      ->where('flag_utama', 6)
      ->where('flag_publish', 1)
      ->orderby('berita.updated_at', 'desc')
      ->get();

    // dd($getberitaberjalan);

    return view('frontend.pages.index')
    ->with('getkategoridrdoomels', $getkategoridrdoomels)
    ->with('getkategoriartikel', $getkategoriartikel)
    ->with('getkategoribagiilmu', $getkategoribagiilmu)
    ->with('getprofiledoomels', $getprofiledoomels)
    ->with('getslider', $getslider)
    ->with('getgaleri', $getgaleri)
    ->with('getberitaberjalan', $getberitaberjalan)
    ->with('getheadline', $getheadline)
    ->with('getberitaterbaru',$getberitaterbaru)
    ->with('getberitapopuler', $getberitapopuler)
    ->with('getjumlahkategori',$getjumlahkategori)
    ->with('getberitabykategoridrdoomels', $getberitabykategoridrdoomels)
    ->with('getberitabykategoriartikel', $getberitabykategoriartikel)
    ->with('getberitabykategoribagiilmu', $getberitabykategoribagiilmu);
  }

  public function listBerita()
  {
    return view('frontend.pages.listberita');
  }

  public function detailBerita()
  {
    return view('frontend.pages.detailberita');
  }


  public function indexAwal()
  {
    // NAVBAR //
    $getsekilastangerang = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id')
      ->where('berita.id_skpd', null)
      ->where('kategori_berita.flag_utama', 1)
      ->get();

    $getberita = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id')
      ->where('berita.id_skpd', null)
      ->where('kategori_berita.flag_utama', 0)
      ->get();

    // SLIDER //
    $getslider = Slider::where([
      ['id_skpd', null],
      ['flag_slider', 1]
    ])->orderby('created_at', 'desc')
    ->get();

    // BERITA TERKINI (MARQUEE) //
    $getberitaterbaru = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select('berita.judul_berita', 'berita.id', 'berita.created_at', 'berita.url_foto', 'kategori_berita.nama_kategori')
      ->where('flag_publish', 1)
      ->where('kategori_berita.flag_utama', 0)
      ->orderby('berita.updated_at', 'desc')
      ->limit(12)
      ->get();

    // HEADLINE //
    $getheadline = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
    ->select('berita.judul_berita', 'berita.id', 'berita.created_at', 'berita.url_foto', 'kategori_berita.nama_kategori')
    ->where('flag_publish', 1)
    ->where('kategori_berita.flag_utama', 0)
    ->where('flag_headline', 1)
    ->orderby('berita.updated_at', 'desc')
    ->limit(4)
    ->get();


    // BERITA SKPD //
    $getberitaskpd = Berita::join('master_skpd', 'master_skpd.id', '=', 'berita.id_skpd')
      ->select('berita.id', 'berita.judul_berita', 'master_skpd.singkatan', 'berita.url_foto')
      ->where('id_skpd', '!=', null)
      ->where('flag_publish', 1)
      ->orderby('tanggal_publish', 'desc')
      ->limit(4)
      ->get();

    // JEJARING //
    $getjejaring = MasterSKPD::where('flag_skpd', 1)->get();

    // BERITA PER KATEGORI //
    $gettop4 = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select('id_kategori', DB::raw('count(*) as jumlah'))
      ->where('berita.id_skpd', null)
      ->where('flag_utama', 0)
      ->groupby('id_kategori')
      ->orderby('jumlah', 'desc')
      ->limit(4)
      ->get();

    $getberitabykategori = array();

    $i=0;
    foreach ($gettop4 as $key) {
      $getberitabykategori[$i] = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
        ->select('*', 'berita.created_at as tanggal_posting', 'berita.id as id_berita', 'kategori_berita.id as id_kategori')
        ->where('id_kategori', $key->id_kategori)
        ->where('flag_utama', 0)
        ->where('flag_publish', 1)
        ->orderby('berita.updated_at', 'desc')
        ->get();
      $i++;
    }

    // GET KATEGORI FOR FOOTER //
    $getfooterkat = KategoriBerita::where('id_skpd', null)->get();

    // GET GALERI //
    $getgaleri = Gallery::where('id_skpd', null)->get();

    //GET VIDEO
    $getvideo = Video::where('id_skpd', null)->orderBy('created_at')->limit(3)->get();

    //GET APLIKASI
    $getaplikasi = Aplikasi::where('id_skpd', null)->orderBy('created_at')->limit(12)->get();

    return view('frontend.pages.index')
      ->with('getsekilastangerang', $getsekilastangerang)
      ->with('getberita', $getberita)
      ->with('getslider', $getslider)
      ->with('getberitaterbaru', $getberitaterbaru)
      ->with('getberitaskpd', $getberitaskpd)
      ->with('getjejaring', $getjejaring)
      ->with('getberitabykategori', $getberitabykategori)
      ->with('getfooterkat', $getfooterkat)
      ->with('getgaleri', $getgaleri)
      ->with('getvideo', $getvideo)
      ->with('getaplikasi', $getaplikasi)
      ->with('getheadline', $getheadline);
  }
}
