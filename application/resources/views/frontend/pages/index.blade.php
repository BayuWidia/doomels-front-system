@extends('frontend.layouts.master')
@section('title')
    <title>Doomels</title>
@stop

   
@section('content')
    
        <div class="gallery-slideshow clearfix">
                
            <div id="exposure"></div> 
            <div class="panel clearfix">
                <ul id="images">
                    @foreach ($getslider as $key)
                    <li>
                        <?php $photo300 = explode(".", $key->url_slider); ?>
                        <a href="{{url('images')}}/{{$key->url_slider}}"><img src="{{url('images')}}/{{$photo300[0]}}_300x160.{{$photo300[1]}}" alt="" /></a>
                        <h2><a href="#">{{$key->keterangan_slider}}</a></h2>
                    </li>
                    @endforeach
                </ul>
                <div id="controls"></div>
            </div>          
            <div class="clear"></div>
        </div>
        <!-- gallery-slideshow -->

        <div class="kp-headline-wrapper clearfix">
            <span class="kp-headline-title">Breaking News</span>
            <div class="kp-headline clearfix">                        
                <dl class="ticker-1 clearfix">
                    @foreach ($getberitaberjalan as $key)
                        <dd><a href="#">{{$key->judul_berita}}</a></dd>
                    @endforeach
                </dl>
                <!--ticker-1-->
            </div>
            <!--kp-headline-->
        </div>
        <!-- kp-headline-wrapper -->

        <div class="widget-area-5 clearfix">
            <div class="widget kp-article-list-widget">
                <h4 class="widget-title">
                    <span class="bold-line"><span></span></span>
                    <span class="solid-line"></span>
                    <span class="text-title">Headline</span>
                </h4>
                <!-- widget-title -->
                <div class="row mb-20">
                @foreach ($getheadline as $key)
                    <div class="col-md-3 col-sm-3">
                        <article class="entry-item clearfix">
                            <div class="entry-thumb">
                            @if ($key->url_foto != null)
                                <?php $photo250 = explode(".", $key->url_foto); ?>
                                <a href="#"><img src="{{url('images')}}/{{$photo250[0]}}_250x150.{{$photo250[1]}}" alt="" /></a>
                            @else
                                <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-1.jpg')}}" alt="" /></a>
                            @endif
                            </div>
                        </article>
                        <!-- entry-thumb -->
                        <div class="entry-content">
                            <span class="h-line"></span>
                            <header class="clearfix">
                                <span class="entry-icon pull-left text-center"></span>
                                <div class="header-content">
                                    <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$key->id_kategori}}/{{$key->id}}">{{$key->judul_berita}}</a></h6>
                                    <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$key->name}}</a></span>
                                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($key->updated_at)->format('d-M-y')}}</a></span></span>
                                </div>
                                <!-- header-content -->
                            </header>
                            <p><?php echo substr($key->isi_berita, 0,200) ?>....</p>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <!-- widget -->
        </div>
        
        <div class="bottom-content">

            <div class="main-col">
                
                <div class="widget-area-5">
                    <div class="widget kp-article-list-widget">
                        <h4 class="widget-title">
                            <span class="bold-line"><span></span></span>
                            <span class="solid-line"></span>
                            <span class="text-title">Dr Doomels</span>
                        </h4>
                        <!-- widget-title -->
                        <article class="entry-item last-item clearfix">
                            <div class="entry-thumb">
                                @if ($getberitabykategoridrdoomels[0]->url_foto != null)
                                <?php $photo395 = explode(".", $getberitabykategoridrdoomels[0]->url_foto); ?>
                                    <a href="#"><img src="{{url('images')}}/{{$photo395[0]}}_395x237.{{$photo395[1]}}" alt="" /></a>
                                @else
                                    <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-4.jpg')}}" alt="" /></a>
                                @endif
                            </div>
                            <!-- entry-thumb -->
                            <div class="entry-content">
                                <header>
                                    <h6 class="entry-title"><a href="#">{{$getberitabykategoridrdoomels[0]->judul_berita}}</a></h6>
                                    <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;{{$getberitabykategoridrdoomels[0]->name}}&nbsp;&nbsp;</a></span>
                                    <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoridrdoomels[0]->tanggal_posting)->format('d-M-y H:i:s')}}&nbsp;&nbsp;</a></span></span>
                                </header>
                                <p><?php echo substr($getberitabykategoridrdoomels[0]->isi_berita, 0,200) ?><a href="{{url('detailberita/show')}}/{{$getberitabykategoridrdoomels[0]->id_kategori}}/{{$getberitabykategoridrdoomels[0]->id_berita}}">...[Lihat Selengkapnya]</a></p>
                            </div>
                            <!-- entry-content -->
                        </article>
                        <!-- entry-item -->
                        <ul class="older-post">
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        @if ($getberitabykategoridrdoomels[1]->url_foto != null)
                                        <?php $photo100 = explode(".", $getberitabykategoridrdoomels[1]->url_foto); ?>
                                            <a href="#"><img src="{{url('images')}}/{{$photo100[0]}}_100x70.{{$photo100[1]}}" alt="" /></a>
                                        @else
                                            <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-5.jpg')}}" alt="" /></a>
                                        @endif
                                    </div>
                                    <!-- entry-thumb -->
                                    <div class="entry-content">
                                        <header>
                                            <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$getberitabykategoridrdoomels[1]->id_kategori}}/{{$getberitabykategoridrdoomels[1]->id_berita}}">{{$getberitabykategoridrdoomels[1]->judul_berita}}</a></h6>
                                        </header>
                                    </div>
                                    <!-- entry-content -->
                                </article>
                                <!-- entry-item -->
                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$getberitabykategoridrdoomels[1]->name}}</a></span>
                                <br/>
                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoridrdoomels[1]->tanggal_posting)->format('d-M-y H:i:s')}}</a></span></span>
                            </li>
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        @if ($getberitabykategoridrdoomels[2]->url_foto != null)
                                        <?php $photo100 = explode(".", $getberitabykategoridrdoomels[2]->url_foto); ?>
                                            <a href="#"><img src="{{url('images')}}/{{$photo100[0]}}_100x70.{{$photo100[1]}}" alt="" /></a>
                                        @else
                                            <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-5.jpg')}}" alt="" /></a>
                                        @endif
                                    </div>
                                    <!-- entry-thumb -->
                                    <div class="entry-content">
                                        <header>
                                            <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$getberitabykategoridrdoomels[2]->id_kategori}}/{{$getberitabykategoridrdoomels[2]->id_berita}}">{{$getberitabykategoridrdoomels[2]->judul_berita}}</a></h6>
                                        </header>
                                    </div>
                                    <!-- entry-content -->
                                </article>
                                <!-- entry-item -->
                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$getberitabykategoridrdoomels[2]->name}}</a></span>
                                <br/>
                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoridrdoomels[2]->tanggal_posting)->format('d-M-y H:i:s')}}</a></span></span>
                            </li>
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        @if ($getberitabykategoridrdoomels[3]->url_foto != null)
                                        <?php $photo100 = explode(".", $getberitabykategoridrdoomels[3]->url_foto); ?>
                                            <a href="#"><img src="{{url('images')}}/{{$photo100[0]}}_100x70.{{$photo100[1]}}" alt="" /></a>
                                        @else
                                            <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-5.jpg')}}" alt="" /></a>
                                        @endif
                                    </div>
                                    <!-- entry-thumb -->
                                    <div class="entry-content">
                                        <header>
                                            <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$getberitabykategoridrdoomels[3]->id_kategori}}/{{$getberitabykategoridrdoomels[3]->id_berita}}">{{$getberitabykategoridrdoomels[3]->judul_berita}}</a></h6>
                                        </header>
                                    </div>
                                    <!-- entry-content -->
                                </article>
                                <!-- entry-item -->
                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$getberitabykategoridrdoomels[3]->name}}</a></span>
                                <br/>
                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoridrdoomels[3]->tanggal_posting)->format('d-M-y H:i:s')}}</a></span></span>
                            </li>
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        @if ($getberitabykategoridrdoomels[4]->url_foto != null)
                                        <?php $photo100 = explode(".", $getberitabykategoridrdoomels[4]->url_foto); ?>
                                            <a href="#"><img src="{{url('images')}}/{{$photo100[0]}}_100x70.{{$photo100[1]}}" alt="" /></a>
                                        @else
                                            <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-5.jpg')}}" alt="" /></a>
                                        @endif
                                    </div>
                                    <!-- entry-thumb -->
                                    <div class="entry-content">
                                        <header>
                                            <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$getberitabykategoridrdoomels[4]->id_kategori}}/{{$getberitabykategoridrdoomels[4]->id_berita}}">{{$getberitabykategoridrdoomels[4]->judul_berita}}</a></h6>
                                        </header>
                                    </div>
                                    <!-- entry-content -->
                                </article>
                                <!-- entry-item -->
                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$getberitabykategoridrdoomels[4]->name}}</a></span>
                                <br/>
                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoridrdoomels[4]->tanggal_posting)->format('d-M-y H:i:s')}}</a></span></span>
                            </li>
                        </ul>
                        <!-- older-post -->
                        <div class="clear"></div>
                    </div>
                    <!-- widget -->
                </div>
                <!-- widget-area-5 -->

                <div class="widget-area-6">
                    <div class="widget">
                        <h4 class="widget-title">
                            <span class="bold-line"><span></span></span>
                            <span class="solid-line"></span>
                            <span class="text-title">Artikel</span>
                        </h4>
                        <!-- widget-title -->
                        <article class="entry-item last-item clearfix">
                            <div class="entry-thumb">
                                @if ($getberitabykategoriartikel[0]->url_foto != null)
                                <?php $photo395 = explode(".", $getberitabykategoriartikel[0]->url_foto); ?>
                                    <a href="#"><img src="{{url('images')}}/{{$photo395[0]}}_395x237.{{$photo395[1]}}" alt="" /></a>
                                @else
                                    <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-4.jpg')}}" alt="" /></a>
                                @endif
                            </div>
                            <!-- entry-thumb -->
                            <div class="entry-content">
                                <header>
                                     <h6 class="entry-title"><a href="#">{{$getberitabykategoriartikel[0]->judul_berita}}</a></h6>
                                    <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;{{$getberitabykategoriartikel[0]->name}}&nbsp;&nbsp;</a></span>
                                    <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoriartikel[0]->tanggal_posting)->format('d-M-y H:i:s')}}&nbsp;&nbsp;</a></span></span>
                                </header>
                                <p><?php echo substr($getberitabykategoriartikel[0]->isi_berita, 0,200) ?>
                                <a href="{{url('detailberita/show')}}/{{$getberitabykategoriartikel[0]->id_kategori}}/{{$getberitabykategoriartikel[0]->id_berita}}">...[Lihat Selengkapnya]</a></p>
                            </div>
                            <!-- entry-content -->
                        </article>
                        <!-- entry-item -->
                        <ul class="older-post">
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        @if ($getberitabykategoriartikel[1]->url_foto != null)
                                        <?php $photo100 = explode(".", $getberitabykategoriartikel[1]->url_foto); ?>
                                            <a href="#"><img src="{{url('images')}}/{{$photo100[0]}}_100x70.{{$photo100[1]}}" alt="" /></a>
                                        @else
                                            <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-5.jpg')}}" alt="" /></a>
                                        @endif
                                    </div>
                                    <!-- entry-thumb -->
                                    <div class="entry-content">
                                        <header>
                                            <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$getberitabykategoriartikel[1]->id_kategori}}/{{$getberitabykategoriartikel[1]->id_berita}}">{{$getberitabykategoriartikel[1]->judul_berita}}</a></h6>
                                        </header>
                                    </div>
                                    <!-- entry-content -->
                                </article>
                                <!-- entry-item -->
                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$getberitabykategoriartikel[1]->name}}</a></span>
                                <br/>
                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoriartikel[1]->tanggal_posting)->format('d-M-y H:i:s')}}</a></span></span>
                            </li>
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        @if ($getberitabykategoriartikel[2]->url_foto != null)
                                        <?php $photo100 = explode(".", $getberitabykategoriartikel[2]->url_foto); ?>
                                            <a href="#"><img src="{{url('images')}}/{{$photo100[0]}}_100x70.{{$photo100[1]}}" alt="" /></a>
                                        @else
                                            <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-5.jpg')}}" alt="" /></a>
                                        @endif
                                    </div>
                                    <!-- entry-thumb -->
                                    <div class="entry-content">
                                        <header>
                                            <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$getberitabykategoriartikel[2]->id_kategori}}/{{$getberitabykategoriartikel[2]->id_berita}}">{{$getberitabykategoriartikel[2]->judul_berita}}</a></h6>
                                        </header>
                                    </div>
                                    <!-- entry-content -->
                                </article>
                                <!-- entry-item -->
                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$getberitabykategoriartikel[2]->name}}</a></span>
                                <br/>
                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoriartikel[2]->tanggal_posting)->format('d-M-y H:i:s')}}</a></span></span>
                            </li>
                        </ul>
                        <!-- older-post -->
                    </div>
                    <!-- widget -->
                </div>
                <!-- widget-area-6 -->

                <div class="widget-area-7">
                    <div class="widget">
                        <h4 class="widget-title">
                            <span class="bold-line"><span></span></span>
                            <span class="solid-line"></span>
                            <span class="text-title">Bagi Ilmu</span>
                        </h4>
                        <!-- widget-title -->
                        <article class="entry-item last-item clearfix">
                            <div class="entry-thumb">
                                @if ($getberitabykategoribagiilmu[0]->url_foto != null)
                                <?php $photo395 = explode(".", $getberitabykategoribagiilmu[0]->url_foto); ?>
                                    <a href="#"><img src="{{url('images')}}/{{$photo395[0]}}_395x237.{{$photo395[1]}}" alt="" /></a>
                                @else
                                    <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-4.jpg')}}" alt="" /></a>
                                @endif
                            </div>
                            <!-- entry-thumb -->
                            <div class="entry-content">
                                <header>
                                     <h6 class="entry-title"><a href="#">{{$getberitabykategoribagiilmu[0]->judul_berita}}</a></h6>
                                    <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;{{$getberitabykategoribagiilmu[0]->name}}&nbsp;&nbsp;</a></span>
                                    <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoribagiilmu[0]->tanggal_posting)->format('d-M-y H:i:s')}}&nbsp;&nbsp;</a></span></span>
                                </header>
                                <p><?php echo substr($getberitabykategoribagiilmu[0]->isi_berita, 0,200) ?>
                                <a href="{{url('detailberita/show')}}/{{$getberitabykategoribagiilmu[0]->id_kategori}}/{{$getberitabykategoribagiilmu[0]->id_berita}}">...[Lihat Selengkapnya]</a></p>
                            </div>
                            <!-- entry-content -->
                        </article>
                        <!-- entry-item -->
                        <ul class="older-post">
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        @if ($getberitabykategoribagiilmu[1]->url_foto != null)
                                        <?php $photo100 = explode(".", $getberitabykategoribagiilmu[1]->url_foto); ?>
                                            <a href="#"><img src="{{url('images')}}/{{$photo100[0]}}_100x70.{{$photo100[1]}}" alt="" /></a>
                                        @else
                                            <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-5.jpg')}}" alt="" /></a>
                                        @endif
                                    </div>
                                    <!-- entry-thumb -->
                                    <div class="entry-content">
                                        <header>
                                            <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$getberitabykategoribagiilmu[1]->id_kategori}}/{{$getberitabykategoribagiilmu[1]->id_berita}}">{{$getberitabykategoribagiilmu[1]->judul_berita}}</a></h6>
                                        </header>
                                    </div>
                                    <!-- entry-content -->
                                </article>
                                <!-- entry-item -->
                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$getberitabykategoribagiilmu[1]->name}}</a></span>
                                <br/>
                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoribagiilmu[1]->tanggal_posting)->format('d-M-y H:i:s')}}</a></span></span>
                            </li>
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        @if ($getberitabykategoribagiilmu[2]->url_foto != null)
                                        <?php $photo100 = explode(".", $getberitabykategoribagiilmu[2]->url_foto); ?>
                                            <a href="#"><img src="{{url('images')}}/{{$photo100[0]}}_100x70.{{$photo100[1]}}" alt="" /></a>
                                        @else
                                            <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-5.jpg')}}" alt="" /></a>
                                        @endif
                                    </div>
                                    <!-- entry-thumb -->
                                    <div class="entry-content">
                                        <header>
                                            <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$getberitabykategoribagiilmu[2]->id_kategori}}/{{$getberitabykategoribagiilmu[2]->id_berita}}">{{$getberitabykategoribagiilmu[2]->judul_berita}}</a></h6>
                                        </header>
                                    </div>
                                    <!-- entry-content -->
                                </article>
                                <!-- entry-item -->
                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$getberitabykategoribagiilmu[2]->name}}</a></span>
                                <br/>
                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($getberitabykategoribagiilmu[2]->tanggal_posting)->format('d-M-y H:i:s')}}</a></span></span>
                            </li>
                        </ul>
                        <!-- older-post -->
                    </div>
                    <!-- widget -->
                </div>
                <!-- widget-area-7 -->

                <div class="clear"></div>

                <div class="widget-area-8">
                    <div class="widget kp-featured-widget">
                        <h4 class="widget-title">
                            <span class="bold-line"><span></span></span>
                            <span class="solid-line"></span>
                            <span class="text-title">Galeri</span>
                        </h4>
                        <!-- widget-title -->
                        <article class="last-item clearfix">
                            <div class="flexslider kp-featured-slider loading">
                                <ul class="slides">
                                    @foreach($getgaleri as $key)
                                    <li class="standard-post">
                                        <div class="entry-thumb">
                                            <a href="#"><img src="{{url('images')}}/{{$key->url_gambar}}" alt="" /></a>
                                        </div>
                                        <!-- entry-thumb -->
                                        <!-- <div class="entry-content">
                                            <span class="h-line"></span>
                                            <header class="clearfix">
                                                <span class="entry-icon pull-left text-center"><span></span></span>
                                                <div class="header-content">
                                                    <h6 class="entry-title"><a href="#">Attractive woman</a><span class="bottom-line"></span></h6>
                                                    <span class="entry-categories">Posted in: <a href="#">News Store</a></span>
                                                    <span class="entry-tags"><span class="entry-bullet"></span>Tags: <a href="#">Office,</a> <a href="#">Summer,</a> <a href="#">Video,</a></span>
                                                </div> -->
                                                <!-- header-content -->
                                            <!-- </header>
                                            <p>Maecenas aliquet, elit vitae egestas lacinia, nibh purus accumsan metus, ut mollis est eros tempus sem. Vivamus nulla lacus, venenatis non convallis quis, sollicitudin id mi. Maecenas aliquet, elit vitae egestas lacinia, nibh purus</p>
                                        </div> -->
                                        <!-- entry-content -->
                                    </li>
                                    @endforeach
                                </ul>
                                <!-- slides -->
                            </div>
                            <!-- kp-blogpost-slider -->
                        </article>
                        <!-- last-item -->
                    </div>
                    <!-- widget -->
                </div>
                <!-- widget-area-8 -->

                <div class="r-color"></div>
                <br/><br/>
                 <div id="related-post">
                    <h4>Berita Populer</h4>
                    <div class="list-carousel responsive">
                        <ul class="related-post-carousel">
                            @foreach($getberitapopuler as $key)
                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb">
                                            @if ($key->url_foto != null)
                                                <?php $photo256 = explode(".", $key->url_foto); ?>
                                                <a href="#"><img src="{{url('images')}}/{{$photo256[0]}}_256x173.{{$photo256[1]}}" alt="" /></a>
                                            @else
                                                <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-36.jpg')}}" alt="" /></a>
                                            @endif
                                        </div>
                                        <!-- entry-thumb -->
                                        <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$key->id_kategori}}/{{$key->id}}">{{$key->judul_berita}}</a></h6>
                                    </article>
                                </li>
                            @endforeach
                        </ul>
                        <!-- related-post-carousel -->
                        <div class="clearfix"></div>
                        <div id="pager2" class="carousel-pager clearfix"></div>
                    </div>
                    <!-- list-carousel -->
                </div>
                <!-- related-post -->
            </div>
            <!-- main-col -->

            <div class="sidebar widget-area-4">
                <div class="widget kp-accordion-widget">
                    <div class="acc-wrapper">

                        <div class="accordion-title">
                          <h3><a href="#">Berita Terbaru</a></h3>
                          <span>+</span>
                        </div>
                        <div class="accordion-container">
                            <ul>
                                @foreach($getberitaterbaru as $key)
                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb">
                                            @if ($key->url_foto != null)
                                                <?php $photo80 = explode(".", $key->url_foto); ?>
                                                <a href="#"><img src="{{url('images')}}/{{$photo80[0]}}_80x80.{{$photo80[1]}}" alt="" /></a>
                                            @else
                                                <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-20.jpg')}}" alt="" /></a>
                                            @endif
                                        </div>
                                        <div class="entry-content">
                                            <header>
                                                <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$key->id_kategori}}/{{$key->id}}"><?php echo substr($key->judul_berita, 0,75)?></a></h6>
                                            </header>
                                        </div>
                                    </article>
                                        <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$key->name}}</a></span><br/>
                                        <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($key->updated_at)->format('d-M-y H:i:s')}}</a></span></span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--acc-wrapper-->
                </div>
                <!-- widget -->

                <div class="widget widget_categories">
                    <h4 class="widget-title">
                            <span class="bold-line"><span></span></span>
                            <span class="solid-line"></span>
                            <span class="text-title">Kategori</span>
                        </h4>
                        <!-- widget-title -->
                    <ul>
                        @foreach($getjumlahkategori as $key)
                            <li><a href="{{url('listberita/show', $key->id_kategori)}}" title="">{{$key->nama_kategori}}</a>&nbsp;({{$key->jumlah}})</li>
                        @endforeach
                    </ul>
                </div>
                <!-- widget -->

                <div class="widget kp-video-widget">
                    <h4 class="widget-title">
                        <span class="bold-line"><span></span></span>
                        <span class="solid-line"></span>
                        <span class="text-title">Video</span>
                    </h4>
                    <!-- widget-title -->
                    <div class="video-wrapper">
                        <iframe src="http://player.vimeo.com/video/69463471?title=0&amp;byline=0&amp;portrait=0" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                    </div>
                    <!-- video-wrapper -->
                </div>
                <!-- widget -->

                <div class="widget widget_archive">
                    <h4 class="widget-title">
                        <span class="bold-line"><span></span></span>
                        <span class="solid-line"></span>
                        <span class="text-title">Archives</span>
                    </h4>
                    <ul>
                        <li><a title="" href="#">January 2013</a>&nbsp;(1)</li>
                        <li><a title="" href="#">December 2012</a>&nbsp;(12)</li>
                        <li><a title="" href="#">November 2012</a>&nbsp;(10)</li>
                        <li><a title="" href="#">October 2012</a>&nbsp;(9)</li>
                        <li><a title="" href="#">September 2012</a>&nbsp;(5)</li>
                        <li><a title="" href="#">August 2012</a>&nbsp;(7)</li>
                        <li><a title="" href="#">July 2012</a>&nbsp;(3)</li>
                    </ul>
                </div><!--widget-->

            </div>
            <!-- sidebar -->

            <div class="clear"></div>
        </div>
        <!-- bottom-content -->
    @stop  
