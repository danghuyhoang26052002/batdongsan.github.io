@extends('templates.layoutadmin')
@section('title', $title)
@section('content')
    <!-- Main content -->
    <section class="content appTuyenSinh">
        <link rel="stylesheet" href="{{ asset('public_admin/default/bower_components/select2/dist/css/select2.min.css')}} ">
        <style>
            .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
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
            .select2-container--default .select2-selection--multiple{
                margin-top:10px;
                border-radius: 0;
            }
            .select2-container--default .select2-results__group{
                background-color: #eeeeee;
            }
        </style>

        <?php //Hiển thị thông báo thành công?>
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        <?php //Hiển thị thông báo lỗi?>
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
                            <label for="ten_de_thi" class="col-md-3 col-sm-4 control-label">Tên banner <span class="text-danger">(*)</span></label>

                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="name_banner" id="name_banner" class="form-control" value="@isset($request['name']){{ $request['name'] }}@endisset">
                                <span id="mes_sdt"></span>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="lbds_id" class="col-md-3 col-sm-4 control-label">Chọn bài viết<span class="text-danger">(*)</span></label>
                        <div class="col-md-9 col-sm-8">
                            <select class="form-control" name="id_news" id="id_news">
                                <option value="@isset($request['id_news']){{ $request['id_news'] }}@endisset">Chọn tin tức</option>
                                @foreach ($list_news as $new)
                                <option value="{{$new->id}}">ID:{{$new->id}} - {{$new->title_news}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
                        <div class="col-md-9 col-sm-8">
                            <div class="row">
                                <div class="col-xs-6">
                                    <img id="image" src="https://i.pinimg.com/564x/3e/67/48/3e6748785814256cd32c6c0c52aa673e.jpg" value="@isset($request['image']){{ $request['image'] }}@endisset" alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />
                                    <input type="file" name="image" accept="image/*" class="form-control-file @error('image') is-invalid @enderror" id="image_1" >
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
            <a href="{{route('route_BackEnd_Banner_List')}}" class="btn btn-default">Cancel</a>
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
        $("#image_1").change(function() {
            readURL(this, '#image');
        });

    });
</script>
@endsection