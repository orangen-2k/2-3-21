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
                                            <input type="text" class="form-control" name="tenemail" placeholder="Nhập tên email bạn muốn tìm..." value="{{$keyword}}" />
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
                                <br/><br/>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Ảnh</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
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
                                @foreach ($Dondangky as $item)
                                    <tr>
                                        <td scope="row">{{$i++}}</td>
                                        <td><img src='{{ $item->anh ? asset('image/' .$item->anh) : 'https://ui-avatars.com/api/?name=' . $item->name . '&background=random' }}' style="width: 50px; height: 50px" class="img-thumbnail"></td>
                                        <td>{{$item->hodem}} {{$item->ten}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->sodienthoai}}</td>
                                        <td>
                                            @if($item->trangthai == 0)
                                                <a href="{{route('update.dangky',['id'=>$item])}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip"  data-original-title="Xem">
                                                    <i class="fas fa-eye" style="color: #35cc3a;"></i>
                                                </a>
                                            @else
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div style=" display: flex; align-items: center; justify-content: center; ">
                                {{$Dondangky->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
