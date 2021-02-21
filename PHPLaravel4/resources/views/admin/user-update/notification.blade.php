<p>
    Chúng tôi đã nhận được thư đăng ký của bạn chúng tôi hẹn bạn vào 8h sáng ngày mai để có thể nói chuyện
    trực tiếp với bạn
</p><br/><br/><br/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Đơn đăng ký nhập học</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <link rel="shortcut icon" type="image/x-icon"
          href="https://kidsonline.edu.vn/wp-content/themes/kids-online/assets/images/favicon.png" />
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });

    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .chu_dam {
            color: #000000 !important;
        }

    </style>
    <link href="{!! asset('css/vendors.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!!  asset('css/css_loading.css') !!}" rel="stylesheet" type="text/css" />

</head>
<body
    style='font-family: "Times New Roman", Times, serif;'
    class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<form action="{{route('xacnhandon.home')}}" method="POST" >
    @csrf
    <div class="container">
        <div class="row">
            <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="post-6 page type-page status-publish hentry" style="    width: 700px;    margin-left: 21%;">
                    <div class="entry-summary">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="m-portlet__body">
                                    <div class="m-section">
                                        <div class="m-section__content">
                                            <div class="row pt-5">
                                                <div class="col-12">
                                                    @if(session('Notification'))
                                                        <div class="alert alert-success">
                                                            {{session('Notification')}}
                                                        </div>
                                                    @endif
                                                    <center>
                                                        <h3 class="chu_dam">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h3>
                                                        <h3 class="chu_dam">Độc lập - Tự do - Hạnh phúc</h3>
                                                        <p class="chu_dam">----------oo0oo--------</p>
                                                        <br>
                                                        <h3 class="chu_dam">ĐƠN XIN NHẬP HỌC</h3>
                                                    </center>
                                                    <div style="padding-left: 10%">
                                                        <h6><i>Kính gửi: </i><b class="chu_dam">Ban tuyển sinh Trường mầm non
                                                                CoolKids</b></h6>
                                                    </div>
                                                    <br>
                                                    <div style="padding-left: 10%">
                                                        <table>
                                                            <tr>
                                                            <tr>Họ và tên học sinh: <b class="chu_dam view-ten"></b>{{$Dondangky->hodem}} {{$Dondangky->ten}}</tr>
                                                            </tr>
                                                            <tr>
                                                                <td>Giới tính: <b class="chu_dam view-gioi_tinh"></b>
                                                                    @if($Dondangky->gioitinh == 0)
                                                                        {{"Nam"}}
                                                                    @else
                                                                        {{"Nữ"}}
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ngày sinh: <b class="chu_dam view-ngay_sinh"></b>{{$Dondangky->ngaysinh}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Địa chỉ: <b class="chu_dam view-ngay_sinh"></b>{{$Dondangky->diachi}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nơi sinh(Tỉnh, thành phố): <b class="chu_dam view-noi_sinh"></b>{{$Dondangky->thanhpho}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Giới thiệu: <b class="chu_dam view-ngay_sinh"></b>{{$Dondangky->gioithieu}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="visibility: hidden" class="pt-3">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="visibility: hidden" class="pt-3">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thông tin đăng ký</td>
                                                                <td><b class="chu_dam view-noi_o_hien_tai_matp"></b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email: <b class="chu_dam view-noi_o_hien_tai_maqh"></b>{{$Dondangky->email}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Số điện thoại: <b class="chu_dam view-noi_o_hien_tai_so_nha"></b>{{$Dondangky->sodienthoai}}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td style="visibility: hidden" class="pt-3">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="visibility: hidden">
                                                                    <hr>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div style="padding-left: 10%">
                                                        Tôi xin cam đoan về những thông tin khai trong tờ đơn này là đúng sự thật và chấp hành đầy đủ mọi nội quy, quy định của Ngành và Nhà Trường.
                                                    </div>
                                                    <br>
                                                    <div style="margin-left: 40%">
                                                        <button type="submit" class="btn" >Hủy đơn</button>
                                                        <a href="{{route('home')}}" class="btn" >Trở về</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
