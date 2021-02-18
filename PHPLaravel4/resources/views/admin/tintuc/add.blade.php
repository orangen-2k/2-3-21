@extends('admin.admin')
@section('title', "Thêm tin")
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--full-height">
                    <div class="m-wizard m-wizard--2 m-wizard--success m-wizard--step-first" id="m_wizard">
                        <div class="m-wizard__form">
                            <div class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                                <form action="{{route('add.news')}}" method="POST" enctype="multipart/form-data">
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
                                                            Tin tức
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="m-form__section m-form__section--first">
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span> Hình ảnh: </label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <input type="file" name="Hinhanh" class="form-control m-input name-field"
                                                                       placeholder="Điền tiêu đề"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span>Thể loại:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select class="form-control select2" name="Theloai" id="Theloaiid">
                                                                    <option value="" selected>Chọn</option>
                                                                    @foreach ($Category as $item)
                                                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span> Tiêu đề: </label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <input type="text" name="Tieude" class="form-control m-input name-field"
                                                                       placeholder="Điền tiêu đề" value="{{ old('Tieude') }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span> Tóm tắt: </label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <textarea name="Tomtat" id="demo" placeholder="Điền tóm tắt" class="form-control m-input name-field" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="m-form__section m-form__section--first">
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span>Loại tin:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select class="form-control select2" name="Loaitin" id="Loaitinid">
                                                                    <option value="" selected>Chọn</option>
                                                                    @foreach ($Type_of_news as $item)
                                                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span>Nổi bật:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select class="form-control select2" name="Noibat" id="Loaitinid">
                                                                    <option value="" selected>Chọn</option>
                                                                    <option value="0">Có</option>
                                                                    <option value="1">Không</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span> Nội dung: </label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <textarea name="Noidung" id="demo" placeholder="Điền nội dung" class="form-control m-input name-field" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <div class="m-form__actions">
                                                    <a href="{{route('show.news')}}"><button type="button" class="btn btn-danger">Hủy</button></a>
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
@section('script')
    <script>
        $(document).ready(function (){
            $("#Theloaiid").change(function (){
                var idTheloai =$(this).val();
                $idtheloai = idTheloai;
                // alert(idTheloai);
                {{--$.get(`{{route('show.ajax',['idtheloai'=>${idTheloai}])}}`,function(data){--}}
                $.get(`admin/ajax/loaitin/${idTheloai}`,function(data){
                    // alert(idTheloai);
                    // debugger
                   $("#Loaitinid").html(data);
                });
            });
        });
    </script>
@endsection
