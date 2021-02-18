@extends('admin.admin')
@section('title', "Sửa tin tức")
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--full-height">
                    <div class="m-wizard m-wizard--2 m-wizard--success m-wizard--step-first" id="m_wizard">
                        <div class="m-wizard__form">
                            <div class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                                <form action="{{route('update.news',['id'=>$News])}}}" method="POST" enctype="multipart/form-data">
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
                                                            Tin tức: <a style="color: #ff0000;">{{$News->tieude}}</a>
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
                                                                       placeholder="Điền tiêu đề" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span>Thể loại:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select class="form-control select2" name="Theloai" id="Theloaiid">
                                                                    <option value="" selected>Chọn</option>
                                                                    @foreach ($Category as $item)
                                                                        <option
                                                                            @if($News->loaitin->theloai->id == $item->id)
                                                                            {{"selected"}}
                                                                            @endif
                                                                            value="{{$item->id}}">{{$item->ten}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span> Tiêu đề: </label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <input type="text" name="Tieude" class="form-control m-input name-field"
                                                                       placeholder="Điền tiêu đề" value="{{$News->tieude}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span> Tóm tắt: </label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                    <textarea name="Tomtat" id="demo" placeholder="Điền tóm tắt"
                                                                              class="form-control m-input name-field"
                                                                              rows="3">{{$News->tomtat}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="m-form__section m-form__section--first">
                                                        <img style="margin-left: 50%" width="100px" src="{!! asset('image/'.$News->hinh) !!}">
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span>Loại tin:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select class="form-control select2" name="Loaitin" id="Loaitinid">
                                                                    <option value="" selected>Chọn</option>
                                                                    @foreach ($Type_of_news as $item)
                                                                        <option
                                                                            @if($News->loaitin->id == $item->id)
                                                                            {{"selected"}}
                                                                            @endif
                                                                            value="{{$item->id}}">{{$item->ten}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span>Nổi bật:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select class="form-control select2" name="Noibat" id="Loaitinid">
                                                                    <option value="0" selected
                                                                    @if($News->noibat == 0)
                                                                        {{"selected"}}
                                                                        @endif>Có</option>
                                                                    <option value="1"
                                                                    @if($News->noibat == 1)
                                                                        {{"selected"}}
                                                                        @endif>Không</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                    class="text-danger">*</span> Nội dung: </label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                    <textarea name="Noidung" id="demo" placeholder="Điền nội dung"
                                                                              class="form-control m-input name-field"
                                                                              rows="3">{{$News->noidung}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <div class="m-form__actions">
                                                <a href="{{route('show.news')}}"><button type="button" class="btn btn-danger">Hủy</button></a>
                                                <button type="submit" class="btn btn-success">Sửa</button>
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
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_tabs_3_1" role="tabpanel">
                        <div class="m-portlet__body table-responsive">
                            <table id="myTable"  class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline">
                                <thead>
                                @if(session('Notification'))
                                    <div class="alert alert-success">
                                        {{session('Notification')}}
                                    </div>
                                @endif
                                <a href="{{route('add.news')}}" class="btn btn-success btn-sm m-btn m-btn m-btn--icon m-btn--pill">
                                    <span>
                                        <i class="fas fa-plus"></i>
                                        <span>Tạo mới tin</span>
                                    </span>
                                </a><br/><br/>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Người dùng</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody align="center">
                                @foreach ($News->comment as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->noidung}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            {{--                                            <a target="_blank" href="sua/{{$item->id}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">--}}
                                            <a href="/admin/comment/delete/{{$item->id}}/{{$News->id}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip"  data-original-title="Xóa ">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
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
