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
</style>
@extends('user.user') @section('title', "Chi tiết bảng tin") @section('content-user')
    <section id="about" class="section section-about wow fadeInUp">
        <div class="profile">
            <div class="row">
                <div class="col-sm-4">
                    <div class="photo-profile">
                        <frofilre-show></frofilre-show>
                    </div>
                    <div>
                        <div class="available">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <span class="text-available"> Trung tâm </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="info-profile">
                        <h2><span class="span-hi">Xin chào: {{$Nguoidung->name}}</span> </h2>
                        <h3></h3>
                        <p>.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="ul-info">
                                    <li class="li-info">
                                        <span class="title-info">Email: </span>
                                        <span class="info">{{$Nguoidung->email}}</span>
                                    </li>
                                    <li class="li-info">
                                        <span class="title-info">Địa chỉ:</span>
                                        <span class="info"></span>
                                    </li>
                                    <li class="li-info">
                                        <span class="title-info">Điện thoại:</span>
                                        <span class="info">{{$Nguoidung->number}}</span>
                                    </li>
                                    <li class="li-info">
                                        <span class="title-info">Tài khoản:</span>
                                        <span class="info"> VNĐ</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <a style="color: #ffffff;" href="{{route('check.passport',['id'=>$Nguoidung])}}" class="snip1582">Đổi mật khẩu</a>
                <a style="color: #ffffff;" href="{{route('change.information',['id'=>$Nguoidung])}}" class="snip1582">Đổi thông tin</a>
            </div>
        </div>
    </section>
@endsection
