@extends('admin.admin')
@section('title', "Thêm loại tin")
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--full-height">
                    <div class="m-wizard m-wizard--2 m-wizard--success m-wizard--step-first" id="m_wizard">
                        <div class="m-wizard__form">
                            <div class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                                <form action="{{route('add.type_of_news')}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    @csrf
                                    <div class="m-portlet__body">
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
                                        <div class="m-wizard__form-step--current" id="m_wizard_form_step_1">
                                            <div class="row">
                                                <div class="col-md-12 mt-4">
                                                    <div class="m-form__heading">
                                                        <h3 class="m-form__heading-title" style="font-weight: bold">
                                                            Loại tin
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="m-form__section m-form__section--first">
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span> Tên loại tin: </label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <input type="text" name="NameLT" class="form-control m-input name-field"
                                                                       placeholder="Điền tên loại tin" value="{{ old('NameLT') }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="m-form__section m-form__section--first">
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span>Thể loại:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select class="form-control select2" name="Theloai" id="ho_khau_thuong_tru_matp">
                                                                    <option value="" selected>Chọn</option>
                                                                    @foreach ($Category as $item)
                                                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <div class="m-form__actions">
                                                    <a href="{{route('show.type_of_news')}}"><button type="button" class="btn btn-danger">Hủy</button></a>
                                                    <button type="submit" class="btn btn-success">Thêm mới</button>
                                                </div>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
