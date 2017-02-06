@extends('frontend.layouts.master')
@section('title')
    <title>Doomels</title>
@stop

   
@section('content')
    
        <div class="bottom-content">

            <div class="main-col">
                <div class="entry-box">
                    <h4 class="entry-title">
                        <span class="text-title">{{$getdata->judul_berita}}</span>
                    </h4>
                    <!-- entry-title -->
                    <div class="entry-thumb">
                        @if ($getdata->foto_berita != null)
                            <?php $photo810_475 = explode(".", $getdata->foto_berita); ?>
                            <a href="#"><img src="{{url('images')}}/{{$photo810_475[0]}}_810x475.{{$photo810_475[1]}}" alt="" /></a>
                        @else
                             <img src="{{ asset('/theme/placeholders/post-image/post-33.jpg')}}" alt="" />
                        @endif
                    </div>
                    <!-- entry-thumb -->
                    <br/>
                    <div class="entry-content">
                        <span class="entry-author"><span class="fa fa-user entry-icon"></span><a>&nbsp;{{$getdata->name}}&nbsp;&nbsp;</a></span>
                        <span class="entry-date"><span class="fa fa-clock-o entry-icon"></span><span><a>&nbsp;{{ \Carbon\Carbon::parse($getdata->updated_at)->format('d-M-y H:i:s')}}&nbsp;&nbsp;</a></span></span>
                        <span class="entry-eye"><span class="fa fa-eye entry-icon"></span><a>&nbsp;{{$getdata->view_counter}}</a></span>
                        <br/>
                        <!-- socials-link -->
                        <div class="clear"></div>
                        <p><?php echo $getdata->isi_berita?></p>
                    </div>
                    <div class="tag-box pull-left">
                        <span>Tags:&nbsp;&nbsp;</span>
                        <a href="#">{{$getdata->tags}}</a><span>&nbsp;</span>
                    </div>
                    <!-- tag-box -->
                    <div class="clear"></div>
                    <hr>
                    <!-- tag-box -->
                    <div class="clear"></div>
                    <div class="row mb-20">
                        <div class="col-md-12 col-sm-12">
                            <h6 class="elements-title">Dumelan Gue ......</h6>
                            <blockquote><?php echo $getdata->isi_dumel?></blockquote>
                        </div>
                    </div>
                </div>
                <!-- entry-box -->

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

                <div class="r-color"></div>

            </div>
            <!-- main-col -->

            <div class="sidebar widget-area-4">

                <div class="widget kp-accordion-widget">
                    <div class="acc-wrapper">
                        <div class="accordion-title">
                            <h3><a href="#">Berita Terkait</a></h3>
                            <span>+</span>
                        </div>
                        <div class="accordion-container">
                            <ul>
                                @foreach($getberitaterkait as $key)
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
                                        <br/>
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
    @stop  
