@extends('admin.admin') @section('content') @section('title','Xác nhận đăng ký')
<form action="{{route('update.dangky',['id'=>$Dondangky])}}" method="POST" >
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
                                                        <a href="{{route('delete.dangky',['id'=>$Dondangky])}}" class="btn" >Hủy đơn</a>
                                                        <button type="submit" class="btn" >Xác nhận</button>
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
@endsection
