@extends('templates.layoutadmin')
@section('title', $title)
@section('content')
<!-- Main content -->
<section class="content appTuyenSinh">
    <link rel="stylesheet" href="{{ asset('public_admin/default/bower_components/select2/dist/css/select2.min.css')}} ">
    <style>
        .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            padding: 3px 0px;
            height: 30px;
        }

        .select2-container {
            margin-top: -5px;
        }

        option {
            white-space: nowrap;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 0px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: #216992;
        }

        .select2-container--default .select2-selection--multiple {
            margin-top: 10px;
            border-radius: 0;
        }

        .select2-container--default .select2-results__group {
            background-color: #eeeeee;
        }
    </style>

    <?php //Hiển thị thông báo thành công
    ?>
    @if ( Session::has('success') )
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    @endif
    <?php //Hiển thị thông báo lỗi
    ?>
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    @endif
    <h2 style="font-style: oblique;">{{$title}}</h2>
    <!-- Phần nội dung riêng của action  -->
    <form class="form-horizontal " action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ten_de_thi" class="col-md-3 col-sm-4 control-label">Tiêu Đề<span class="text-danger">(*)</span></label>

                        <div class="col-md-9 col-sm-8">
                            <input type="text" name="title_news" id="title_news" class="form-control" value="@isset($request['title_news']){{ $request['title_news'] }}@endisset">
                            <span id="mes_sdt"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-3 col-sm-4 control-label">Nội Dung<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                        <textarea class="form-control" rows="5" id="content_news" name="content_news" value="@isset($request['content_news']){{ $request['content_news'] }}@endisset"></textarea>
                            <span id="mes_sdt"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lbds_id" class="col-md-3 col-sm-4 control-label">Danh Mục<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <select class="form-control" name="lbds_id" id="ldbs_id">
                                <option value="@isset($request['contact']){{ $request['contact'] }}@endisset">Chọn Loại Danh Mục</option>
                                @foreach ($list_lbds as $lbds)
                                <option value="{{$lbds->id}}">{{$lbds->name_lbds}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
                        <div class="col-md-9 col-sm-8">
                            <div class="row">
                                <div class="col-xs-6">
                                    <img id="images_news" src="https://banner2.cleanpng.com/20180702/oga/kisspng-newspaper-computer-icons-symbol-news-icon-5b3add8cb3a9a8.8956674115305844607359.jpg" value="@isset($request['images']){{ $request['images'] }}@endisset" alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />
                                    <input type="file" name="images_news" accept="image/*" class="form-control-file @error('images_news') is-invalid @enderror" id="images_news_1">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary"> Save</button>
            <a href="{{route('route_BackEnd_News_List')}}" class="btn btn-default">Cancel</a>
        </div>
        <!-- /.box-footer -->
    </form>

</section>
@endsection
@section('script')
<script src="{{ asset('public_admin/default/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('public_admin/default/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script>
    $(function() {
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#images_news_1").change(function() {
            readURL(this, '#images_news');
        });

    });
</script>
@endsection