<style>
    @import url(https://fonts.googleapis.com/css?family=BenchNine:700);

    .snip1582 {
        background-color: #35a3c4;
        border: none;
        color: #ffffff;
        cursor: pointer;
        display: inline-block;
        font-family: 'Times New Roman';
        font-size: 16px;
        line-height: 1em;
        margin: 15px 10px;
        outline: none;
        padding: 5px 10px 5px;
        position: relative;
        text-transform: uppercase;
        font-weight: 700;
    }

    .snip1582:before,
    .snip1582:after {
        border-color: transparent;
        -webkit-transition: all 0.25s;
        transition: all 0.25s;
        border-style: solid;
        border-width: 0;
        content: "";
        height: 24px;
        position: absolute;
        width: 24px;
    }

    .snip1582:before {
        border-color: #35a3c4;
        border-top-width: 2px;
        left: 0px;
        top: -5px;
    }

    .snip1582:after {
        border-bottom-width: 2px;
        border-color: #35a3c4;
        bottom: -5px;
        right: 0px;
    }

    .snip1582:hover,
    .snip1582.hover {
        background-color: #35a3c4;
    }

    .snip1582:hover:before,
    .snip1582.hover:before,
    .snip1582:hover:after,
    .snip1582.hover:after {
        height: 100%;
        width: 100%;
    }

    .right {
        display: block;
        position: relative;
        margin-bottom: 2em;
        clear: both;
    }

    .right {
        float: right;
        margin-right: 37%;
    }

    .photo-profile-img {
        height: 500px;
    }
</style>
@extends('user.user') @section('title', "Chi tiết bảng tin") @section('content-user')
<br /><br /><br /><br /><br /><br /><br />
<div class="container">
    <div class="row">
        <div class="single main col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div
                class="post type-post status-publish format-image hentry category-post-format post_format-post-format-image">
                <div class="entry-wrap">
                    <div class="entry-content clearfix">
                        <section id="about" class="section section-about wow fadeInUp">
                            <div class="profile">
                                <div class="row" style="    margin: 0 auto;    width: 1200px;">
                                    <div class="col-sm-4">
                                        <div class="photo-profile">
                                            <img class="photo-profile-img"
                                                src="{{asset('image/'.Auth::user()->avatar)}}" /><br>
{{--                                            <div class="download-resume">--}}
{{--                                                <i class="fas fa-camera" aria-hidden="true"></i>--}}
{{--                                                <span class="text-download">Thay ảnh đại diện</span>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div>
                                            @if($Nguoidung->level === 1)
                                            <div class="available">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                <span class="text-available"> Admin </span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="info-profile">
                                            <h2><span class="span-hi">Xin chào: {{$Nguoidung->username}} {{$Nguoidung->name}}</span> </h2>
                                            <h3>.</h3>
                                            <h4>Giới thiệu: {{$Nguoidung->summary}}</h4><br/>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <ul class="ul-info">
                                                        <li class="li-info">
                                                            <span class="title-info">Email: </span>
                                                            <span class="info">{{$Nguoidung->email}}</span>
                                                        </li>
                                                        <li class="li-info">
                                                            <span class="title-info">Địa chỉ:</span>
                                                            <span class="info">{{$Nguoidung->streetInformation}}, {{$Nguoidung->province}}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul class="ul-info">
                                                        <li class="li-info">
                                                            <span class="title-info">Điện thoại:</span>
                                                            <span class="info">{{$Nguoidung->phoneNumber}}</span>
                                                        </li>
                                                        <li class="li-info">
                                                            <span class="title-info">Ngày sinh:</span>
                                                            <span class="info">{{$Nguoidung->birthYear}}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right" style="margin-top: 340px">
                                            <a style="color: #ffffff;"
                                                href="{{route('change.passport',['id'=>$Nguoidung])}}"
                                                class="snip1582">Đổi mật khẩu</a>
                                            <a style="color: #ffffff;"
                                                href="{{route('change.information',['id'=>$Nguoidung])}}"
                                                class="snip1582">Đổi thông tin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section><br /><br /><br />
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
