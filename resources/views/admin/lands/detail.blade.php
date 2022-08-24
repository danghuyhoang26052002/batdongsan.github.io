@extends('templates.layoutadmin')
@section('title', $title)
@section('content')
<!-- Main content -->
<section class="content appTuyenSinh">
    <link rel="stylesheet" href="{{ asset('default/bower_components/select2/dist/css/select2.min.css')}} ">
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
    <div>
        <h2 style="font-style: oblique;">{{$title}}</h2>
    </div>
    <!-- Phần nội dung riêng của action  -->
    <form class="form-horizontal " action="{{ route('route_BackEnd_Lands_Update',['id'=>request()->route('id')]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="form-group">
                    <label for="name_bds" class="col-md-3 col-sm-4 control-label">Tên BĐS <span class="text-danger">(*)</span></label>

                    <div class="col-md-9 col-sm-8">
                        <input type="text" name="name_bds" id="name_bds" class="form-control" value="{{$objItem->name_bds}}">
                        <span id="mes_sdt"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="location" class="col-md-3 col-sm-4 control-label">Địa Chỉ <span class="text-danger">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <input type="text" name="location" id="location" class="form-control" value="{{$objItem->location}}">
                        <span id="mes_sdt"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-md-3 col-sm-4 control-label">Gía Tiền <span class="text-danger">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <input type="text" name="price" id="price" class="form-control" value="{{$objItem->price}}">
                        <span id="mes_sdt"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-md-3 col-sm-4 control-label">Diện tích<span class="text-danger">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <input type="text" name="area" id="area" class="form-control" value="{{$objItem->area}}">
                        <span id="mes_sdt"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-md-3 col-sm-4 control-label">Số phòng ngủ <span class="text-danger">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <input type="text" name="number_bedroom" id="number_bedroom" class="form-control" value="{{$objItem->number_bedroom}}">
                        <span id="mes_sdt"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-md-3 col-sm-4 control-label">Số phòng tắm <span class="text-danger">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <input type="text" name="number_bathroom" id="number_bathroom" class="form-control" value="{{$objItem->number_bathroom}}">
                        <span id="mes_sdt"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-md-3 col-sm-4 control-label">Liên Hệ <span class="text-danger">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <input type="text" name="contact" id="contact" class="form-control" value="{{$objItem->contact}}">
                        <span id="mes_sdt"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-3 col-sm-4 control-label">Mô Tả<span class="text-description">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <textarea class="form-control" rows="5" id="description" name="description" value="">{{$objItem->description}}</textarea>
                        <span id="mes_sdt"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lbds_id" class="col-md-3 col-sm-4 control-label">Loại BĐS<span class="text-danger">(*)</span></label>
                    <div class="col-md-9 col-sm-8">
                        <select class="form-control" name="lbds_id" id="ldbs_id">
                            <option value="">Chọn Loại BĐS</option>
                            @foreach ($list_lbds as $lbds)
                            <option value="{{$lbds->id}}" <?php if ($lbds->id == $objItem->lbds_id) : ?>selected <?php endif ?>>
                                {{$lbds->name_lbds}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
                    <div class="col-md-9 col-sm-8">
                        <div class="row">
                            <div class="col-xs-6">
                                <img id="images_lbds" src="{{$objItem->images?''.Storage::url($objItem->images):'https://i.pinimg.com/564x/3e/67/48/3e6748785814256cd32c6c0c52aa673e.jpg' }}" value="@isset($request['images']){{ $request['images'] }}@endisset" alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid" />
                                <input type="file" name="images_bds" accept="image/*" class="form-control-file @error('images_bds') is-invalid @enderror" id="images_bds_1">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.box-body -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary"> Save</button>
            <a href="{{route('route_BackEnd_Lands_List')}}" class="btn btn-default">Cancel</a>
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
        $("#images_bds_1").change(function() {
            readURL(this, '#images_lbds');
        });

    });
</script>
@endsection