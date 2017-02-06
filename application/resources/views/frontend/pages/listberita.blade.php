@extends('frontend.layouts.master')
@section('title')
    <title>Doomels</title>
@stop

   
@section('content')
    
        <div class="bottom-content">

            <div class="main-col">
                
                <div class="breadcrumb clearfix">
                    <a href="index.html">Home</a>
                    <span>&nbsp;/&nbsp;</span>
                    <span class="current-page">Kategori</span>
                </div>
                <!-- breadcrumb -->

                <div class="widget kp-entry-list-widget">
                    <h4 class="widget-title">
                        <span class="bold-line"><span></span></span>
                        <span class="solid-line"></span>
                        <span class="text-title">
                        @foreach($getdata as $key)
                            {{$key->nama_kategori}}
                        @break
                        @endforeach</span>
                    </h4>
                    <!-- widget-title -->

                    <div class="masonry-wrapper">
                        <ul class="entry-list masonry-container transitions-enabled centered clearfix masonry">
                            @foreach($getdata as $key)
                                <li class="masonry-box">
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb">
                                            @if ($key->foto_berita != null)
                                                <?php $photo395 = explode(".", $key->foto_berita); ?>
                                                <a href="#"><img src="{{url('images')}}/{{$photo395[0]}}_395x237.{{$photo395[1]}}" alt="" /></a>
                                            @else
                                                <a href="#"><img src="{{ asset('/theme/placeholders/post-image/post-9.jpg')}}" alt="" /></a>
                                            @endif
                                        </div>
                                        <!-- entry-thumb -->
                                        <div class="entry-content">
                                            <header>
                                                <h6 class="entry-title"><a href="{{url('detailberita/show')}}/{{$key->id}}/{{$key->id_berita}}">{{$key->judul_berita}}</a></h6>
                                                <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$key->name}}</a></span>
                                                <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($key->updated_at)->format('d-M-y H:i:s')}}</a></span></span>
                                                <span class="entry-eye"><span class="fa fa-eye entry-icon"></span><a>&nbsp;&nbsp;{{$key->view_counter}}</a></span>
                                            </header>
                                        </div>
                                        <!-- entry-content -->
                                    </article>
                                    <!-- entry-item -->
                                </li>
                            @endforeach
                        </ul>
                        <!-- entry-list -->
                    </div>
                    <!-- masonry-wrapper -->

                    <div class="pagination clearfix">
                        <ul class="page-numbers clearfix">
                            <li>{{ $getdata->links() }}</li>
                    </div>
                </div>                    

                <div class="r-color"></div>
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
                                                <a><img src="{{url('images')}}/{{$photo80[0]}}_80x80.{{$photo80[1]}}" alt="" /></a>
                                            @else
                                                <a><img src="{{ asset('/theme/placeholders/post-image/post-20.jpg')}}" alt="" /></a>
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
                        <div class="accordion-title">
                            <h3><a href="#">Berita Populer</a></h3>
                            <span>+</span>
                        </div>
                        <div class="accordion-container">
                            <ul>
                                @foreach($getberitapopuler as $key)
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
                                        <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;&nbsp;{{$key->name}}</a></span>
                                        <br/>
                                        <span class="entry-eye"><span class="fa fa-eye entry-icon"></span><a>&nbsp;&nbsp;{{$key->view_counter}}</a></span>
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
