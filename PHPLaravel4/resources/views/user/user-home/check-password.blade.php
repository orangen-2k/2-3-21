@extends('user.user') @section('title', "Đổi thông tin") @section('content-user')
<div style="margin: 0 auto; width: 50%;">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br/>
            @endforeach
        </div>
    @endif
    <form action="{{route('check.passport',['id'=>$User])}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="form-group m-form__group row">
            <label class="col-xl-3 col-lg-3 col-form-label"><span
                    class="text-danger">*</span> Kiểm tra mật khẩu: </label>
            <div class="col-xl-9 col-lg-9">
                <input type="text" name="Password-now" class="form-control m-input name-field"
                       placeholder="Điền mật khâỉ hiện tại" />
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <div class="m-form__actions">
                <a href="{{route('show.user')}}"><button type="button" class="btn btn-danger">Hủy</button></a>
                <button type="submit" class="btn btn-success">Xác nhận</button>
            </div>
        </div>
    </form>
</div>
@endsection
