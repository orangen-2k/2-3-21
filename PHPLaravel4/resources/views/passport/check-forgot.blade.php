@extends('passport.passport')
@section('content-passport')
@section('title','Kiểm tra mã  xác nhận')
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
                        <h3 class="m-login__title">Quên mật khẩu ?</h3>
                        <div class="m-login__desc">Vui lòng nhập mã xác nhận để kiểm tra</div>
                    </div>
                    <form class="m-login__form m-form" action="{{route('check.forgot')}}" method="POST">
                        @csrf
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br/>
                                @endforeach
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Nhập mã xác nhận" name="check-forgot" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">Gửi</button>&nbsp;&nbsp;
                            <a class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn" href="login" >Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
