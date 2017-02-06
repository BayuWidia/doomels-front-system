      <div id="kp-page-header" class="header-style-1">
        
        <div id="header-top">
            <ul id="top-menu" class="pull-left">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <!-- top-menu -->
            
            <div class="clear"></div>
        </div>
        <!-- header-top -->

        <div id="header-middle">
            <div id="logo-image" class="pull-left"><a href="index.html"><img src="{{ asset('/theme/placeholders/doomels.png') }}" alt="" /></a></div>
            <div id="top-banner" class="pull-right"><a href="#"><img src="{{ asset('/theme/placeholders/top-banner.jpg') }}" alt="" /></a></div>
            <div class="clear"></div>
        </div>
        <!-- header-middle -->

        <div id="header-bottom">
            <div id="header-bottom-inner">
                <nav id="main-nav" class="pull-left">
                    <ul id="main-menu" class="clearfix">
                        <li>
                            <a href="{{url('/')}}"><span></span>Home</a>
                        </li>
                        <li>
                            <a href="#"><span></span>Dr Doomels</a>
                            <ul class="sf-sub-menu">
                                @foreach($getkategoridrdoomels as $key)
                                    <li><a href="{{url('listberita/show', $key->id)}}">{{ $key->nama_kategori }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span></span>Artikel</a>
                            <ul class="sf-sub-menu">
                                @foreach($getkategoriartikel as $key)
                                    <li><a href="{{url('listberita/show', $key->id)}}">{{ $key->nama_kategori }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span></span>Bagi Ilmu</a>
                            <ul class="sf-sub-menu">
                                @foreach($getkategoribagiilmu as $key)
                                    <li><a href="{{url('listberita/show', $key->id)}}">{{ $key->nama_kategori }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span></span>Profile Doomels</a>
                            <ul class="sf-sub-menu">
                                @foreach($getprofiledoomels as $key)
                                    <li><a href="#">{{ $key->nama_kategori }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <!-- main-menu -->
                    <div id="mobile-menu">
                        <span>Menu</span>
                        <ul id="toggle-view-menu">
                            <li class="clearfix">
                                <h3><a href="{{url('/')}}">Home</a></h3>                         
                            </li>

                            <li class="clearfix">
                                <h3><a href="#">Dr Doomels</a></h3>
                                <span>+</span>
                                <div class="clear"></div>                    
                                <div class="menu-panel clearfix">
                                    <ul>
                                        <li>
                                            <a href="#">Blog post</a>
                                        </li>
                                        <li>
                                            <a href="#">Single post</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="clearfix">
                                <h3><a href="#">Artikel</a></h3>
                                <span>+</span>
                                <div class="clear"></div>                    
                                <div class="menu-panel clearfix">
                                    <ul>
                                        <li>
                                            <a href="#">Blog post</a>
                                        </li>
                                        <li>
                                            <a href="#">Single post</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="clearfix">
                                <h3><a href="#">Bagi Ilmu</a></h3>
                                <span>+</span>
                                <div class="clear"></div>                    
                                <div class="menu-panel clearfix">
                                    <ul>
                                        <li>
                                            <a href="#">Blog post</a>
                                        </li>
                                        <li>
                                            <a href="#">Single post</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="clearfix">
                                <h3><a href="#">Profile Doomels</a></h3>
                                <span>+</span>
                                <div class="clear"></div>                    
                                <div class="menu-panel clearfix">
                                    <ul>
                                        <li>
                                            <a href="#">Blog post</a>
                                        </li>
                                        <li>
                                            <a href="#">Single post</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul><!--toggle-view-menu-->
                    </div><!--mobile-menu-->
                </nav>
                <!-- main-nav -->
                
                <div class="clear"></div>
            </div>
            <!-- header-bottom-inner -->
        </div>
        <!-- header-bottom -->

    </div>
    <!-- kp-page-header -->