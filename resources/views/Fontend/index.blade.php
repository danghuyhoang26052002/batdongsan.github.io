@extends('templates.layout')
@section('title', $title)
@section('content')
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- STAR HEADER SEARCH -->

<!-- Carousel wrapper -->
<div id="rev_slider_26_1_wrapper " class="rev_slider_wrapper fullscreen-container home-rev-slider" data-alias="mask-showcase" data-source="gallery">
    <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
    <div id="rev_slider_26_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
        <ul>
            @foreach ($banner as $bn)
            <!-- SLIDE 1 -->
            <li data-index="rs-73" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="{{asset("storage/".$bn->image)}}" data-rotate="0" data-saveperformance="off" data-title="" data-param1="1" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->

                <img src="{{asset("storage/".$bn->image)}}" data-bgcolor='#f8f8f8' style='' alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>

                <!-- LAYER 1  right image overlay dark-->
                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup" id="slide-73-layer-1" data-x="['right','right','right','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontweight="['100','100','400','400']" data-width="['full','full','full','full']" data-height="['full','full','full','full']" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:0;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;text-transform:left;background-color:rgba(0,0,0,0.5);">
                </div>

                <!-- LAYERS 2 number block-->
                <div class="tp-caption rev-btn  tp-resizeme slider-block sx-bg-primary" id="slide-73-layer-2" data-x="['left','left','left','center']" data-hoffset="['60','60','30','0']" data-y="['middle','middle','middle','top']" data-voffset="['-220','-220','-220','50']" data-fontweight="['600','600','600','600']" data-fontsize="['120','120','80','80']" data-lineheight="['120','120','80','80']" data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','center']" data-paddingtop="[20,20,20,20]" data-paddingright="[10,10,10,10]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[10,10,10,10]" style="z-index:10;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; "></div>

                <!-- LAYER 3  Thin text title-->
                <div class="tp-caption   tp-resizeme slider-tag-line" id="slide-74-layer-3" data-x="['left','left','left','center']" data-hoffset="['60','60','30','0']" data-y="['middle','middle','middle','top']" data-voffset="['-80','-80','-80','170']" data-fontsize="['64','64','60','40']" data-lineheight="['74','74','70','50']" data-width="['700','650','620','380']" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":300,"speed":750,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]' data-textAlign="['left','left','left','center']" data-paddingtop="[10,10,10,10]" data-paddingright="[20,20,20,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]" style="z-index:10;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  font-weight:200; letter-spacing:10px; color: #fff; text-transform:uppercase">Bất Động Sản</div>

                <!-- LAYER 4  Bold Title-->
                <div class="tp-caption   tp-resizeme" id="slide-74-layer-4" data-x="['left','left','left','center']" data-hoffset="['60','60','30','0']" data-y="['middle','middle','middle','top']" data-voffset="['10','10','10','230']" data-fontsize="['64','64','60','40']" data-lineheight="['74','74','70','50']" data-width="['700','700','700','700']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":200,"speed":750,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]' data-textAlign="['left','left','left','center']" data-paddingtop="[20,20,20,20]" data-paddingright="[20,20,20,10]" data-paddingbottom="[30,30,30,30]" data-paddingleft="[0,0,0,10]" style="z-index:10;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-transform:uppercase; letter-spacing:10px; white-space: normal;font-weight: 600; color: #fff;">3 Miền</div>

                <!-- LAYER 5  Paragraph-->
                <div class="tp-caption   tp-resizeme" id="slide-74-layer-5" data-x="['left','left','left','center']" data-hoffset="['60','60','30','0']" data-y="['middle','middle','middle','top']" data-voffset="['90','90','90','300']" data-fontsize="['20','20','20','20']" data-lineheight="['30','30','30','30']" data-width="['600','600','600','380']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":200,"speed":750,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]' data-textAlign="['left','left','left','center']" data-paddingtop="[20,20,20,20]" data-paddingright="[20,20,20,20]" data-paddingbottom="[30,30,30,30]" data-paddingleft="[0,0,0,0]" style="z-index:10;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  white-space: normal; color: #fff;">Tìm ngay bất động sản phù hợp với mong ước của bạn !</div>

                <!-- LAYER 6  Read More-->
                <div class="tp-caption rev-btn  tp-resizeme" id="slide-74-layer-6" data-x="['left','left','left','center']" data-hoffset="['60','60','30','0']" data-y="['middle','middle','middle','top']" data-voffset="['180','180','180','410']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index:9; line-height:30px;"><a href="Javascript:;" class="site-button-secondry btn-half"><span> Xem Thêm</span></a></div>

                <!-- LAYER 7 left dark Block -->
                <div class="tp-caption rev-btn  tp-resizeme rev-slider-white-block" id="slide-74-layer-7" data-x="['right','right','left','right']" data-hoffset="['870','570','0','870']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-frames='[{"from":"y:[-0%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":0,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},
                                {"delay":"wait","speed":0,"to":"y:[-0%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[250,250,250,250]" data-paddingright="[250,150,150,150]" data-paddingbottom="[250,250,250,250]" data-paddingleft="[250,150,250,250]" style="z-index: 6; width:6000px;background-color:#687389 ;height:100vh;"></div>

                <!-- Border left Part -->
                <div class="tp-caption tp-shape tp-shapewrapper " id="slide-74-layer-8" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-visibility="['on','on','off','off']" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"delay":50,"speed":100,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power3.easeIn"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index:8;background-color:rgba(0, 0, 0, 0);border-left:40px solid #eef1f2;"> </div>

                <!-- Border bottom Part -->
                <div class="tp-caption tp-shape tp-shapewrapper " id="slide-74-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-visibility="['on','on','off','off']" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"delay":50,"speed":100,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power3.easeIn"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index:8;background-color:rgba(0, 0, 0, 0);border-bottom:80px solid #eef1f2;"> </div>
                <div class="slide-left-social">
                    <ul class="clearfix">
                        <li><a href="#" class="sx-title-swip" data-hover="Linkedin">Linkedin</a></li>
                        <li><a href="#" class="sx-title-swip" data-hover="Twitter">Twitter</a></li>
                        <li><a href="#" class="sx-title-swip" data-hover="Facebook">Facebook</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="tp-bannertimer"></div>
        <!-- left side social bar-->


    </div>
</div>
<!-- Carousel wrapper -->


<!-- END HEADER SEARCH -->


<!-- START SECTION SERVICES -->
<section class="services-home">
    <div class="container">
        <div class="section-title">
            <h3>Bất động sản</h3>
            <h2>Dịch vụ</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 m-top-0 m-bottom-40" data-aos="fade-up" data-aos-delay="150">
                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i class="fa fa-home bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Nhà</h4>
                        <p>Tìm Kiếm Nhà Ở Tại Đây.</p>
                        <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Xem thêm... <i class="fa fa-long-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 m-top-40 m-bottom-40" data-aos="fade-up" data-aos-delay="250">
                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i class="fas fa-building bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Chung cư</h4>
                        <p>Tìm Kiếm Chung Cư Tại Đây.</p>
                        <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Xem thêm... <i class="fa fa-long-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 m-top-40 m-bottom-40 commercial" data-aos="fade-up" data-aos-delay="350">
                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i class="fas fa-warehouse bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Khác</h4>
                        <p>Tìm Kiếm Khác....</p>
                        <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Xem thêm... <i class="fa fa-long-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION SERVICES -->

<!-- START SECTION FEATURED PROPERTIES -->
<section class="featured portfolio bg-black-1">
    <div class="container">
        <div class="row">
            <div class="section-title col-md-5">
                <h3>Bất động sản</h3>
                <h2>Thông tin</h2>
            </div>
        </div>
        <div class="row portfolio-items">
            <!-- BĐS -->
            @foreach ($detail_bds as $bds)
            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">

                <div class="project-single" data-aos="zoom-in" data-aos-delay="150" style="max-width:1200px ;">
                    <div class="listing-item compact">
                        <a href="{{route('route_FontEnd_Lands_Detail',$bds->id)}}" class="listing-img-container">
                            <div class="listing-badges">
                                <span class="featured" style="width:120px ;">{{number_format($bds->price)}} VNĐ</span>
                                <span>Mới Nhất</span>
                            </div>
                            <div class="listing-img-content">
                                <span class="listing-compact-title">{{$bds->name_bds}} <i>Việt Nam</i></span>
                                <ul class="listing-hidden-content">
                                    <li>Diện Tích<span>{{$bds->area}} m2</span></li>
                                    <?php if ($bds->number_bedroom > 0) {
                                        echo "<li>Phòng Ngủ<span>" . $bds->number_bedroom . "</span></li>";
                                    } ?>
                                    <?php if ($bds->number_bathroom > 0) {
                                        echo "<li>Phòng Tắm<span>" . $bds->number_bathroom . "</span></li>";
                                    } ?>
                                </ul>
                            </div>
                            <img src="{{asset("storage/".$bds->images)}}" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        <div class="bg-all">
            <a href="/lands" class="btn btn-outline-light">View All</a>
        </div>
    </div>
</section>
<!-- END SECTION FEATURED PROPERTIES -->

<!-- START SECTION AGENTS -->
<!-- START SECTION BLOG -->
<section class="blog-section bg-black-1">
    <div class="container">
        <div class="section-title">
            <h3>Bất động sản</h3>
            <h2>Tin tức</h2>
        </div>
        <div class="news-wrap">
            <div class="row">
                <!-- Tin Tức -->
                @foreach ($news as $detailnews)
                <div class="col-xl-4 col-md-6 col-xs-12 mb-4">
                    <div class="news-item" data-aos="fade-up" data-aos-delay="150">
                        <a href="{{route('route_FontEnd_News_Detail',$detailnews->id)}}" class="news-img-link">
                            <div class="news-item-img">
                                <img class="img-responsive" src="{{asset("storage/".$detailnews->images)}}" style="height:300px;" alt="blog image">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="{{route('route_FontEnd_News_Detail',$detailnews->id)}}">
                                <h3>{{$detailnews->title_news}}</h3>
                            </a>
                            <div class="dates">
                                <span class="date">Mới nhất</span>
                            </div>
                            <div class="news-item-descr big-news">
                                <p>{{$detailnews->content_news}}</p>
                            </div>
                            <div class="news-item-bottom">
                                <a href="{{route('route_FontEnd_News_Detail',$detailnews->id)}}" class="news-link">Read more...</a>
                                <div class="admin">
                                    <p>Admin</p>
                                    <img src="/public_admin/img/no-avartar.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection