@extends('templates.layout')
@section('title', $title)
@section('content')
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