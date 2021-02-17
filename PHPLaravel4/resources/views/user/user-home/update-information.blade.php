@extends('user.user') @section('title', "Đổi thông tin") @section('content-user')
    <div style="margin: 0 auto; width: 50%;">
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
        <form action="{{route('change.information',['id'=>$User])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="form-group m-form__group row">
                <label class="col-xl-3 col-lg-3 col-form-label"><span
                        class="text-danger">*</span> Họ tên đệm: </label>
                <div class="col-xl-9 col-lg-9">
                    <input type="text" name="Hotendem" class="form-control m-input name-field"
                           placeholder="Điền họ tên đệm" value="{{Auth::user()->username }}">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-xl-3 col-lg-3 col-form-label"><span
                        class="text-danger">*</span> Tên: </label>
                <div class="col-xl-9 col-lg-9">
                    <input type="text" name="Ten" class="form-control m-input name-field"
                           placeholder="Điền tên" value="{{Auth::user()->name }}">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-xl-3 col-lg-3 col-form-label"><span
                        class="text-danger">*</span> Email: </label>
                <div class="col-xl-9 col-lg-9">
                    <input type="text" name="Email" class="form-control m-input name-field"
                           placeholder="Điền Email" value="{{Auth::user()->email }}" readonly>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="m-form__actions">
                    <a href="{{route('user.home')}}"><button type="button" class="btn btn-danger">Hủy</button></a>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="single main col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div
                    class="post type-post status-publish format-image hentry category-post-format post_format-post-format-image">
                    <div class="entry-wrap">
                        <div class="entry-content clearfix">
                            <br /><br /><br />
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
