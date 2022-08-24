@extends('templates.layout')
@section('title', $title)
@section('content')
<section class="single-proper blog details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12">
                        <section class="headings-2 pt-0">
                            <div class="pro-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <h3>{{$objItem->name_bds}} <span class="mrg-l-5 category-tag"></span></h3>
                                        <div class="mt-0">
                                            <a href="#listing-location" class="listing-address">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i> {{$objItem->location}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single detail-wrapper mr-2">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <h4>{{number_format($objItem->price)}} VNĐ</h4>
                                            <div class="mt-0">
                                                <a href="#listing-location" class="listing-address">
                                                    <p>{{$objItem->area}} m2</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- main slider carousel items -->
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner carus" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="{{asset("storage/".$objItem->images)}}" style="max-height:500px; overflow:hidden;" alt="First slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- cars content -->
                        <div class="blog-info details mb-30 mt-3">
                            <h4 class="mb-4">Mô Tả</h4>
                            <pre class="mb-3" style="font-family:'Open Sans';font-size: 16px;">{{$objItem->description}}</pre>

                        </div>
                    </div>
                </div>
                <div class="single homes-content details mb-30">
                    <!-- title -->
                    <h5 class="mb-4">Thông Tin Chi Tiết</h5>
                    <ul class="homes-list clearfix row">
                        <div class="col">
                            <li>
                                <span class="font-weight-bold mr-1">ID:</span>
                                <span class="det">{{$objItem->id}}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Loại:</span>
                                <span class="det">
                                    @foreach ($listbds as $loai)
                                    <?php if ($objItem->lbds_id === $loai->id) {
                                        echo $loai->name_lbds;
                                    } ?>
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Cập Nhật:</span>
                                <span class="det">Mới Nhất</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Giá:</span>
                                <span class="det">{{number_format($objItem->price)}} VNĐ</span>
                            </li>
                        </div>
                        <div class="col">
                            <?php if ($objItem->number_bedroom > 0) {
                                echo '<li>
                                <span class="font-weight-bold mr-1">Phòng Ngủ:</span>
                                <span class="det">' . $objItem->number_bedroom . '</span>
                            </li>';
                            } ?>
                            <?php if ($objItem->number_bedroom > 0) {
                                echo '<li>
                                <span class="font-weight-bold mr-1">Phòng Tắm:</span>
                                <span class="det">' . $objItem->number_bathroom . '</span>
                            </li>';
                            } ?>

                            <li>
                                <span class="font-weight-bold mr-1">Địa Chỉ:</span>
                                <span class="det">{{$objItem->location}}</span>
                            </li>
                        </div>
                    </ul>
                    <!-- title -->

                </div>


                <!-- Star Add Review -->

                <!-- End Add Review -->
            </div>
            <aside class="col-lg-4 col-md-12 car">
                <div class="single widget">
                    <!-- Start: Schedule a Tour -->

                    <!-- End: Schedule a Tour -->
                    <!-- end author-verified-badge -->
                    <div class="sidebar">
                        <div class="widget-boxed mt-33 mt-5">
                            <div class="widget-boxed-header">
                                <h4>Thông Tin Chủ Sở Hữu</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="sidebar-widget author-widget2">
                                    <div class="author-box clearfix">
                                        <img src="/public_admin/img/no-avartar.png" alt="author-image" class="author__img">
                                        <h4 class="author__title"></h4>
                                    </div>
                                    <ul class="author__contact">
                                        <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>Địa Chỉ</li>
                                        <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#">SDT</a></li>
                                        <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">EMAIL</a></li>
                                    </ul>
                                    <div class="agent-contact-form-sidebar">
                                        <h4>YÊU CẦU LIÊN HỆ LẠI</h4>
                                        <form name="contact_form" method="post" action="{{route('route_FontEnd_Lands_Email',$objItem->id)}}">
                                            @csrf
                                            <input type="text" id="name" name="name" placeholder="Full Name" />
                                            <input type="number" id="number" name="phone" placeholder="Phone Number" />
                                            <input type="email" id="email" name="email" placeholder="Email Address" />
                                            <textarea placeholder="Message" name="message"></textarea>
                                            @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <strong>{{ Session::get('success') }}</strong>
                                            </div>
                                            @endif
                                            @if ( Session::has('error') )
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <strong>{{ Session::get('error') }}</strong>

                                            </div>
                                            @endif
                                            @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            @endif

                                            <input type="submit" class="multiple-send-message" value="Gửi Yêu Cầu" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <!-- START SIMILAR PROPERTIES -->
        <section class="similar-property featured portfolio p-0 bg-white-inner">
            <div class="container">
                <h5>Bất Động Sản Liên Quan</h5>
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
                                            <li><?php if ($bds->number_bedroom > 0) {
                                                    echo "Phòng Ngủ";
                                                } ?><span>{{$bds->number_bedroom}}</span></li>
                                            <li><?php if ($bds->number_bedroom > 0) {
                                                    echo "Phòng Tắm";
                                                } ?><span>{{$bds->number_bathroom}}</span></li>
                                            <li>Địa Chỉ <span>{{$bds->location}}</span></li>
                                            <li>Liên Hệ <span>{{$bds->contact}}</span></li>
                                        </ul>
                                    </div>
                                    <img src="{{asset("storage/".$bds->images)}}" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- END SIMILAR PROPERTIES -->
    </div>
</section>
@endsection