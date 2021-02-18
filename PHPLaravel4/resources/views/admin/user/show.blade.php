@extends('admin.admin')
@section('title', "Danh sách tài khoản")
<link href="{!!  asset('css/css_loading.css') !!}" rel="stylesheet" type="text/css" />
@section('content')
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_tabs_3_1" role="tabpanel">
                        <div class="m-portlet__body table-responsive">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="ten" placeholder="Nhập tên bạn muốn tìm..." value="{{$keyword}}" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table m-table m-table--head-bg-success">

                                <thead>
                                @if(session('Notification'))
                                    <div class="alert alert-success">
                                        {{session('Notification')}}
                                    </div>
                                @endif
                                <a href="{{route('add.user')}}" class="btn btn-success btn-sm m-btn m-btn m-btn--icon m-btn--pill">
                                    <span>
                                        <i class="fas fa-plus"></i>
                                        <span>Tạo mới tài khoản</span>
                                    </span>
                                </a><br/><br/>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Quyền</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody align="center">
                                <script>
                                    function onLoadAvatar(e){
                                        let name = e.getAttribute('data-name');
                                        e.setAttribute('src', "https://ui-avatars.com/api/?name=" + name + "&background=random");
                                    }
                                </script>
                                @php
                                    use Illuminate\Support\Facades\Auth;
                                    $i = 1;
                                    function displayAvatar($avatarImg, $name)
                                    {
                                    if($avatarImg != null) {
                                        return asset('storage/' . $avatarImg);
                                    }
                                        return 'https://ui-avatars.com/api/?name=' . $name . '&background=random';
                                    }
                                @endphp
                                @foreach ($User as $item)
                                    <tr>
                                        <td scope="row">{{$i++}}</td>
                                        <td><img src='{{ $item->avatar ? asset('image/' .$item->avatar) : 'https://ui-avatars.com/api/?name=' . $item->name . '&background=random' }}' style="width: 50px; height: 50px" class="img-thumbnail"></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phoneNumber}}</td>
                                        <td>
                                            @if($item->level == 1)
                                                {{"Quản lý"}}
                                            @else
                                                {{"Người dùng"}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('update.user',['id'=>$item])}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip"  data-original-title="Sửa">
                                                <i class="fa fa-pen-alt" style="color: #35cc3a;"></i>
                                            </a>
                                            <a href="{{route('delete.user',['id'=>$item])}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip"  data-original-title="Xóa ">
                                                <i class="far fa-trash-alt" style="color: #ea0c0c;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div style=" display: flex; align-items: center; justify-content: center; ">
                                {{$User->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
