@extends('admin.admin')
@section('title', "Thay đổi thông tin")
<link rel="stylesheet" href="{{ asset('css/change_avatar/change_avatar.css')}}">
@section('content')
    <form method="POST" action="{{route('user.update.information')}}" enctype="multipart/form-data">
        <div class="m-content">
            <div class="row" style="height: 550px">
                <div class="col-xl-3 col-lg-4">
                    <div class="m-portlet m-portlet--full-height  ">
                        <div class="m-portlet__body">
                            <div class="m-card-profile">
                                <div class="m-card-profile__pic">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                        <div class="image-input-wrapper"
                                             style="background-image: url('{{asset('image/'.Auth::user()->avatar)}}'), url('https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random')">
                                        </div>
                                        <label
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="change" data-toggle="tooltip" title=""
                                            data-original-title="Change avatar">
                                            <i class="fas fa-pencil-alt"></i>
                                            <input type="file" name="Hinhanh" onchange="changeAvatar(this)">
                                            <input type="hidden" name="profile_avatar_remove">
                                        </label>
                                    </div>
                                </div><br/>
                                @if(session('image'))
                                    <div class="alert alert-success">
                                        {{session('image')}}
                                    </div>
                                @endif
                                <div class="m-card-profile__details">
                                    <span class="m-card-profile__name">@auth {{Auth::user()->name }} @endauth</span>
                                    <a href="" class="m-card-profile__email m-link">@auth {{Auth::user()->email }} @endauth</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary"
                                    role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active" href="{{route('user.update.information')}}"
                                           role="tab">
                                            <i class="flaticon-share m--hide"></i>
                                            Cập nhật tài khoản
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link " href="{{route('user.update.password')}}"
                                           role="tab">
                                            <i class="flaticon-share m--hide"></i>
                                            Cập nhật mật khẩu
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_user_profile_tab_1">
                                @csrf
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default" role="alert">

                                        </div>
                                        @auth
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">Thông tin cá nhân</h3>
                                        </div>
                                    </div>
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $err)
                                                {{$err}}<br />
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(session('Notification'))
                                        <div class="alert alert-success">
                                            {{session('Notification')}}
                                        </div>
                                    @endif
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Họ tên đệm:</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="Hotendem" placeholder="Nhập họ tên đệp"
                                                   value="{{Auth::user()->username }}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Tên:</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="Ten" placeholder="Nhập tên"
                                                   value="{{Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label"
                                               name="email">Email:</label>
                                        <div class="col-7">
                                            <input class="form-control m-input " type="text" name="email"
                                                   value="{{Auth::user()->email }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-4">
                                            </div>
                                            <div class="col-7">
                                                <button type="submit" class="btn btn-success m-btn m-btn--air m-btn--custom">Sửa</button>&nbsp;&nbsp;
                                                <a href="{{ url('admin') }}"><button type="button" class="btn btn-danger">Hủy</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('css/change_avatar/scripts.bundle.js')}}"></script>
    <script src="{{ asset('css/change_avatar/image-input.js')}}"></script>
    <script>
        function changeAvatar(file){
            let srcAvatar = URL.createObjectURL(file.files[0]);
            $(".error_avatar").attr("src", srcAvatar);
        }
    </script>
@endsection
