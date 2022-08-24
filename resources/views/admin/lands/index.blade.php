@extends('templates.layoutadmin')
@section('title', $title)
@section('css')
<style>
    body {
        /*-webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;*/
        user-select: none;
    }

    .toolbar-box form .btn {
        /*margin-top: -3px!important;*/
    }

    .select2-container {
        margin-top: 0;
    }

    .select2-container--default .select2-selection--multiple {
        border-radius: 0;
    }

    .select2-container .select2-selection--multiple {
        min-height: 30px;
    }

    .select2-container .select2-search--inline .select2-search__field {
        margin-top: 3px;
    }

    .table>tbody>tr.success>td {
        background-color: #009688;
        color: white !important;
    }

    .table>tbody>tr.success>td span {
        color: white !important;
    }

    .table>tbody>tr.success>td span.button__csentity {
        color: #333 !important;
    }
    .table>tbody>tr>td {
        vertical-align: middle;
    }

    /*.table>tbody>tr.success>td i{*/
    /*    color: white !important;*/
    /*}*/
    .text-silver {
        color: #f4f4f4;
    }

    .btn-silver {
        background-color: #f4f4f4;
        color: #333;
    }

    .select2-container--default .select2-results__group {
        background-color: #eeeeee;
    }
</style>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    {{-- @include('templates.header-action')--}}
    <div class="clearfix"></div>
    <div style="border: 1px solid #ccc;margin-top: 10px;padding: 5px;">
        <form action="" method="get">
            <h2 style="font-style:italic;">{{$title}}</h2>
        </form>
        <div class="clearfix"></div>
    </div>
</section>

<!-- Main content -->
<section class="content appTuyenSinh">
    <div id="msg-box">
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
</div>
    <div class="box-body table-responsive no-padding">
        <form action="" method="post">
            @csrf
            <span class="pull-right">Tổng số bản ghi tìm thấy: <span style="font-size: 15px;font-weight: bold;"><?= count($list) ?></span></span>
            <div class="clearfix"></div>
            <div class="double-scroll">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 50px" class="text-center">
                            #ID
                        </th>
                        <th class="text-center">Loại BĐS</th>
                        <th class="text-center">
                            Tên BĐS
                        </th>
                        <th class="text-center">Địa Chỉ</th>
                        <th class="text-center">Gía Tiền</th>
                        <th class="text-center">Diện Tích(m2)</th>
                        <th class="text-center">Số Phòng Ngủ</th>
                        <th class="text-center">Số Phòng Tắm</th>
                        <th class="text-center">Mô Tả</th>
                        <th class="text-center">Liên Hệ</th>
                        <th class="text-center">Ảnh BĐS</th>
                        <th class="text-center">Hành Động</th>
                    </tr>

                    @foreach ($list as $a)
                    <tr>
                        {{-- <td><input type="checkbox" name="chk_hv[]" class="chk_hv" id="chk_hv_{{$item->id}}" value="{{$item->id}}"> </td>--}}
                        <td class="text-center">{{$a->id}}</td>
                        <td class="text-center">
                            @foreach ($list_lbds as $loai)
                                <?php if ($a->lbds_id === $loai->id) {
                                    echo $loai->name_lbds;
                                } ?>
                            @endforeach
                        </td>
                        <td class="text-center">{{$a->name_bds}}</td>
                        <td class="text-center">{{$a->location}}</td>
                        <td class="text-center">{{number_format($a->price)}} VNĐ</td>
                        <td class="text-center">{{$a->area}}m2</td>
                        <td class="text-center">{{$a->number_bedroom}}</td>
                        <td class="text-center">{{$a->number_bathroom}}</td>
                        <td class="text-center">{{$a->description}}</td>
                        <td class="text-center">{{$a->contact}}</td>
                        <td class="text-center"><img src="{{asset("storage/".$a->images)}}" alt="" style="width:350px; height:150px; margin-bottom: 10px;" class="img-responsive"></td>
                        <td class="text-center" style="width:100px;">
                        <a href="{{route('route_BackEnd_Lands_Detail',$a->id)}}">
                                <button type="button" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </a>
                            <a href="{{route('route_BackEnd_Lands_Remove',$a->id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa chứ ?')" >
                                <button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </button>
                            </a>
                        </td>

                    </tr>
                    @endforeach

                </table>
            </div>
        </form>
    </div>
    <br>
    <div class="text-center">
        {{$list->links()}}
    </div>
    <index-cs ref="index_cs"></index-cs>
</section>

@endsection