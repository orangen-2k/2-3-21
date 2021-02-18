@extends('admin.admin')
@section('title', "Thay đổi mật khẩu")
<link rel="stylesheet" href="{{ asset('css/change_avatar/change_avatar.css')}}">
@section('content')
    <div class="m-content">
        <div class="row" style="height: 550px">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__pic">
                                <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                    <div class="image-input-wrapper"
                                         style="background-image: url('{{asset('image/'.Auth::user()->avatar)}}'), url('https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random')">
                                    </div>
                                </div>
                            </div><br/>
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
                                    <a class="nav-link m-tabs__link " href="{{route('user.update.information')}}"
                                       role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        Cập nhật tài khoản
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" href="{{route('user.update.password')}}"
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
                            <form class="m-form m-form--fit m-form--label-align-right" method="POST"
                                  action="{{route('user.update.password')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default" role="alert">

                                        </div>
                                        @auth
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">Đổi mật khẩu</h3>
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
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{session('error')}}
                                        </div>
                                    @endif
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Mật khẩu cũ:</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="password" name="Password" value="" placeholder="Nhập mật khẩu cũ">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">

                                        <label for="example-text-input" class="col-2 col-form-label">Mật khẩu mới:</label>
                                        <div class="col-7">
                                            <input class="form-control m-input " type="password" name="Passwordnew" value="" placeholder="Nhập mật khẩu mới">
                                        </div>

                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nhập lại mật khẩu:</label>
                                        <div class="col-7">
                                            <input class="form-control m-input " type="password" name="Passwordnew-again" value="" placeholder="Nhập lại mật khẩu mới">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
