@extends('templates.layout')
@section('title', $title)
@section('content')
<section class="blog blog-section bg-white">
    <h2 class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><i>{{$objItem->title_news}}</i></h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="news-item details no-mb2">
                            <a href="" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive w-100" src="{{asset("storage/".$objItem->images)}}" alt="blog image">
                                </div>
                            </a>
                            <div class="news-item-text details pb-0">
                                <a href="">
                                    <h3>{{$objItem->title_news}}</h3>
                                </a>
                                <div class="dates">
                                    <span class="date">
                                        @foreach ($listbds as $loai)
                                        <?php if ($objItem->lbds_id === $loai->id) {
                                            echo $loai->name_lbds;
                                        } ?>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" big-news details visib mb-0 mt-5 text-dark">
                        <pre style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 14px;white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap;white-space: pre-wrap;word-wrap: break-word">{{$objItem->content_news}}</pre>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div>
            <section class="similar-property featured portfolio p-0 bg-white-inner">
                <div class="container">
                    <h5>Tin Tức Liên Quan</h5>
                    <div class="row portfolio-items">
                        <div class="news-wrap">
                            <div class="row">
                                <!-- Tin Tức -->
                                @foreach ($news as $detailnews)
                                <div class="col-xl-4 col-md-6 col-xs-12 mb-4">
                                    <div class="news-item" data-aos="fade-up" data-aos-delay="150">
                                        <a href="" class="news-img-link">
                                            <div class="news-item-img">
                                                <img class="img-responsive" src="{{asset("storage/".$detailnews->images)}}" style="height:300px;" alt="blog image">
                                            </div>
                                        </a>
                                        <div class="news-item-text">
                                            <a href="">
                                                <h3>{{$detailnews->title_news}}</h3>
                                            </a>
                                            <div class="dates">
                                                <span class="date">Mới nhất</span>
                                            </div>
                                            <div class="news-item-descr big-news">
                                                <p>{{$detailnews->content_news}}</p>
                                            </div>
                                            <div class="news-item-bottom">
                                                <a href="" class="news-link">Read more...</a>
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
                </div>
            </section>
        </div>

    </div>
</section>
@endsection