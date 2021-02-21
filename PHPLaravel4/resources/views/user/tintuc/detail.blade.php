@extends('user.user') @section('title', "Chi tiết bảng tin")
<link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
<style>
    body {
        background-color: #eee
    }

    .card {
        background-color: #fff;
        border: none
    }

    .form-color {
        background-color: #fafafa
    }

    .form-control {
        height: 48px;
        border-radius: 25px
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #35b69f;
        outline: 0;
        box-shadow: none;
        text-indent: 10px
    }

    .c-badge {
        background-color: #35b69f;
        color: white;
        height: 20px;
        font-size: 11px;
        width: 92px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2px
    }

    .comment-text {
        font-size: 13px
    }

    .wish {
        color: #35b69f
    }

    .user-feed {
        font-size: 14px;
        margin-top: 12px
    }
</style>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
@section('content-user')
<div class="container">
    <div class="wrap-title">
        <h1>{{$Tintuc->tieude}}</h1>
        <div class="bread">
            <div class="breadcrumbs theme-clearfix">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('user.home')}}">Trang chủ</a><span class="go-page"></span></li>
                        <li class="active"><span>{{$Tintuc->loaitin->theloai->ten}}</span></li>
                        <li><a
                                href="{{route('loaitin.home',['id'=>$Tintuc->loaitin->id,'tenkhongdau'=>$Tintuc->loaitin->tenkhongdau])}}">{{$Tintuc->loaitin->ten}}</a><span
                                class="go-page"></span></li>
                        <li class="active"><span>{{$Tintuc->tieude}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="single main col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div
                class="post type-post status-publish format-image hentry category-post-format post_format-post-format-image">
                <div class="entry-wrap">
                    <div class="entry-content clearfix">
                        <div class="content-single-top">
                            <div class="entry-meta clearfix">
                                <div class="entry-comment meta-entry pull-left">
                                    <i class="fa fa-folder-open"></i>Thể loại :
                                    <a>{{$Tintuc->loaitin->theloai->ten}}</a>
                                </div>
                                <div class="meta-entry entry-category pull-left">
                                    <i class="fa fa-calendar"></i>Ngày đăng:
                                    <a>{{$Tintuc->created_at}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p>
                                <img style="width: 100%; height: 500px;" class="alignnone size-full wp-image-405" src="{{asset('image/'.$Tintuc->hinh)}}"
                                    alt="6" width="1110" height="780">
                                {!! $Tintuc->noidung !!}
                            </p>
                            <hr />
                                <div class="card">
                                    @if(Auth::check())
                                    <form action="{{route('comment.home',['id'=>$Tintuc])}}" method="post"
                                          id="commentform" name="commentform" class="form-horizontal row-fluid">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                                            <img src="{{asset('image/'.Auth::user()->avatar)}}" style="width: 70px; height: 60px" class="rounded-circle mr-2">
                                            <input type="text" class="form-control" placeholder="Nhập nội dung bình luận..." name="Noidung" /> &nbsp;&nbsp;
                                            <input type="submit" class="btn btn-success" style="border-radius: 25px; margin-top: -10px; height: 38px;" value="Bình luận" />
                                        </div>
                                    </form>
                                    @endif
                                    @foreach($Tintuc->comment->sortByDesc('created_at') as $item)
                                        <div class="mt-2">
                                            <div class="d-flex flex-row p-3">
                                                <div class="col-md-2">
                                                    <img src="{{asset("image/".$item->user->avatar)}}" style="width: 70px; height: 60px" class="rounded-circle mr-3">
                                                </div>
                                                <div class="col-md-10" style="margin-left: -6%;">
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex flex-row align-items-center"> <span class="mr-2">{{$item->user->name}}</span> </div> <small>{{$item->created_at}}</small>
                                                        </div>
                                                        <p class="text-justify comment-text mb-0">{{$item->noidung}}</p>
                                                        <div class="d-flex flex-row user-feed"> <span class="wish"><i class="fa fa-heartbeat mr-2"></i>24</span> <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            <script type='text/javascript'></script>
                            <div id="authorDetails" class="clearfix">

                            </div>
                        </div>
                        <div class="col-md-3">
                            @foreach($Tinlienquan as $item)
                            <div class="category-contents col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row blog-content blog-content-grid">
                                    <div id="post-01"
                                        class=" clearfix post type-post status-publish format-standard has-post-thumbnail hentry category-blog tag-couples tag-wedding">
                                            <div class="entry clearfix">
                                                <div class="entry-thumb">
                                                    <a class="entry-hover"
                                                        href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}"
                                                        title="Jordy Vanden Nieuwendijk">
                                                        <img style="width: max-content; height: 150px"
                                                            src="{{asset('image/'.$item->hinh)}}"
                                                            class="attachment-large size-large wp-post-image"
                                                            sizes="(max-width: 870px) 100vw, 870px">
                                                    </a>
                                                </div>
                                                <div class="entry-content">
                                                    <div class="content-top clearfix">
                                                        <div class="content-top-in">
                                                            <div class="entry-meta clearfix">
                                                                <div class="entry-comment meta-entry pull-left">
                                                                    <i class="fa fa-folder-open"></i>Thể loại :
                                                                    <a>{{$Tintuc->loaitin->theloai->ten}}</a>
                                                                </div>
                                                                <div class="meta-entry entry-category pull-left">
                                                                    <i class="fa fa-calendar"></i>Ngày đăng:
                                                                    <a>{{$Tintuc->created_at}}</a>
                                                                </div>
                                                            </div>

                                                            <div class="entry-title">
                                                                <h4><a
                                                                        href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}">{{$item->tieude}}</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="readmore">
                                                        <a
                                                            href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}"><i
                                                                class="fa fa-caret-right"></i>Đọc thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                            <div class="vc_row vc_row-fluid">
                                <div class="vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div id="sw_brand_01"
                                                class="responsive-slider sw-brand-container-slider clearfix" data-lg="5"
                                                data-md="4" data-sm="3" data-xs="2" data-mobile="1" data-speed="1000"
                                                data-scroll="1" data-interval="5000" data-autoplay="false">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
