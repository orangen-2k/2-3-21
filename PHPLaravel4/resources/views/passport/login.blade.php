@extends('passport.passport')
@section('content-passport')
@section('title','Đăng nhập')
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2
			@if (session('error_email'))m-login--forget-password @endif" id="m_login" style="background-image: url(../../../image/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{!! asset('image/logo-login.png') !!}" width="300" >
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title"></h3>
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br/>
                            @endforeach
                        </div>
                    @endif
                    @if(session('Error'))
                        <div class="alert alert-danger">
                            {{session('Error')}}
                        </div>
                    @endif
                    @if(session('Notification'))
                        <div class="alert alert-success">
                            {{session('Notification  ')}}
                        </div>
                    @endif
                    <form class="m-login__form m-form" action="login" method="post">
                        @csrf
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Tài khoản" name="email" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Mật khẩu" name="password">
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col-md-8">
                                <a href="{{url('register')}}">Đăng ký</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{url('forgot')}}">Quên mật khẩu</a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
