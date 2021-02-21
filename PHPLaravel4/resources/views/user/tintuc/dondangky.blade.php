@extends('user.user') @section('content-user') @section('title','Đăng ký đơn')
    <link href="{!! asset('css/vendors.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/change_avatar/change_avatar.css')}}">
<body style='font-family: "Times New Roman", Times, serif;' class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
            <div class="col-md-8 offset-2">
                <div class="m-portlet" style="border-radius: 5px !important ;background-color: #f8f9e9;">
                    <div class="pt-5">
                        <center>
                            <h1>ĐƠN ĐĂNG KÝ NHẬP HỌC</h1>
                        </center>
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br />
                            @endforeach
                        </div>
                    @endif
                    <button id="foo2" hidden type="button" class="btn btn-warning" data-toggle="modal" data-target="#m_modal_4" data-backdrop='static' data-keyboard='false'>Thank You</button>
                    <form action="{{route('dondangky.home')}}" method="POST" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon">
                                                <i class="fas fa-cogs"></i>
                                            </span>
                                        <h3 class="m-portlet__head-text">
                                            Thông tin
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="">Họ và đệm :<span class="text-danger">*</span></label>
                                    <input type="text" name="hotendem" class="form-control form-control-sm m-input" placeholder="Điền họ tên đệm "  value="{{ old('hotendem') }}">
                                    <p class="text-danger text-small error" id="ten_error"></p>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="">Họ và đệm :<span class="text-danger">*</span></label>
                                    <input type="text" name="ten" class="form-control form-control-sm m-input" placeholder="Điền tên "  value="{{ old('ten') }}">
                                    <p class="text-danger text-small error" id="ten_error"></p>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Giới tính:<span class="text-danger">*</span></label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <select class="form-control form-control-sm" name="gioitinh" id="noi_o_hien_tai_matp">
                                            <option value="" selected>Chọn</option>
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="">Ngày sinh:<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control form-control-sm m-input" type="date" name="ngay_sinh" placeholder="Chọn ngày"  value="{{ old('ngay_sinh') }}">
                                    </div>
                                    <p class="text-danger text-small error" id="ngay_sinh_error"></p>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Địa chỉ:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control form-control-sm m-input" name="diachi" placeholder="Nhập chi tiết địa chỉ nhà" id="noi_o_hien_tai_so_nha"  value="{{ old('diachi') }}">
                                        <p class="text-danger text-small error" id="noi_o_hien_tai_so_nha_error"></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="">Thành phố:<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="thanhpho" class="form-control form-control-sm m-input" placeholder="Thành phố"  value="{{ old('thanhpho') }}">
                                        <p class="text-danger text-small error" id="ten_error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="">Đối tượng chính sách:</label>
                                <textarea name="gioithieu" id="demo" placeholder="Điền tóm tắt giới thiệu" class="form-control m-input name-field" rows="5"  value="{{ old('gioithieu') }}"></textarea>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="">Ảnh :</label>
                                <div class="custom-file">
                                    <input type="file" accept=".jpg, .pepg, .png" name="anhbe" class="custom-file-input form-control " onchange="showimages(this)" id="customFileAvatar">
                                    <input type="text" hidden name="avatar">
                                    <input type="text" hidden name="check_avatar">
                                    <label class="custom-file-label" for="customFileAvatar">Chọn ảnh</label>
                                </div>
                                <p class="text-danger text-small error" id="check_avatar_error"></p>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="anh-giay-phep img-thumbnail">
                                    <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" id="showimg" width="200">
                                </div>
                            </div>
                        </div>
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </span>
                                        <h3 class="m-portlet__head-text">
                                            Thông tin đăng kí tài khoản
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-5">
                                    <p><em>Thông tin giúp nhà trường cấp tài khoản</em></p>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <div class="input-group m-input-group m-input-group--square">
                                        <input type="text" class="form-control form-control-sm m-input" name="dien_thoai_dang_ki" placeholder="Số điện thoại"  value="{{ old('dien_thoai_dang_ki') }}">
                                    </div>
                                    <p class="text-danger text-small error" id="dien_thoai_dang_ki_error"></p>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control form-control-sm m-input" name="email_dang_ky" placeholder="Email"  value="{{ old('email_dang_ky') }}">
                                    <p class="text-danger text-small error" id="email_dang_ky_error"></p>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-12">
                                    <center>
                                        <button type="submit" class="btn btn-warning">TẠO ĐƠN</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showimages(element) {
            var file = element.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#showimg').attr('src', reader.result);
            }
            reader.readAsDataURL(file);

            $('[name="check_avatar"]').val('have');
        }


        function uploadAvatar() {
            var file = $("#customFileAvatar")[0].files[0];
            var form = new FormData();
            form.append("image", file);
        }
    </script>
</body>
@endsection
