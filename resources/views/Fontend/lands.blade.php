@extends('templates.layout')
@section('title', $title)
@section('content')
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
                                    <li><?php if($bds->number_bedroom>0){echo "Phòng Ngủ";} ?><span>{{$bds->number_bedroom}}</span></li>
                                    <li><?php if($bds->number_bedroom>0){echo "Phòng Tắm";} ?><span>{{$bds->number_bathroom}}</span></li>
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
@endsection