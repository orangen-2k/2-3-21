@extends('admin.admin')
@section('title', "Sửa thể loại")
@section('content')
    <div class="m-content">
        <div id="preload" class="preload-container text-center" style="display: none">
            <img id="gif-load" src="https://icon-library.com/images/loading-gif-icon/loading-gif-icon-17.jpg" alt="">
        </div>
        <form method="post" id="validate-form-add" action="" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="m-portlet m-portlet--full-height">
                        <div class="m-wizard m-wizard--2 m-wizard--success m-wizard--step-first" id="m_wizard">
                            <div class="m-wizard__form">
                                <div class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                                    <div class="m-portlet__body">
                                        <div class=" m-wizard__form-step--current" id="m_wizard_form_step_1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="m-form__heading">
                                                        <h3 class="m-form__heading-title" style="font-weight: bold">
                                                            Thể loại: <a style="color: #ff0000;">{{$Category->ten}}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="m-form__section m-form__section--first">
                                                        @if(count($errors) > 0)
                                                            <div class="alert alert-danger">
                                                                @foreach($errors->all() as $err)
                                                                    {{$err}}<br/>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        @if(session('Notification'))
                                                            <div class="alert alert-success">
                                                                {{session('Notification')}}
                                                            </div>
                                                        @endif
                                                        <form action="{{route('update.category',['id'=>$Category])}}}" method="POST">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                            <div class="form-group m-form__group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                        class="text-danger">*</span> Tên thể loại: </label>
                                                                <div class="col-xl-9 col-lg-9">
                                                                    <input type="text" name="NameTL" class="form-control m-input name-field"
                                                                           placeholder="Điền tên thể loại" value="{{$Category->ten  }}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 d-flex justify-content-end">
                                                                <div class="m-form__actions">
                                                                    <a href="{{route('show.category')}}"><button type="button" class="btn btn-danger">Hủy</button></a>
                                                                    <button type="submit" class="btn btn-success">Sửa lại</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div class=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
