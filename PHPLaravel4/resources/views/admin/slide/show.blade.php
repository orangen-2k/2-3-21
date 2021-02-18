@extends('admin.admin')
@section('title', "Danh sách slide")
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
                                            <input type="text" class="form-control" name="tenslide" placeholder="Nhập tên slide bạn muốn tìm..." value="{{$keyword}}" />
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
                                <a href="{{route('add.slide')}}" class="btn btn-success btn-sm m-btn m-btn m-btn--icon m-btn--pill">
                                    <span>
                                        <i class="fas fa-plus"></i>
                                        <span>Tạo mới loại tin</span>
                                    </span>
                                </a><br/><br/>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Nôi dung</th>
                                    <th>Hình ảnh</th>
                                    <th>Link</th>
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
                                        // return asset('images/avatar-default.png');
                                        return 'https://ui-avatars.com/api/?name=' . $name . '&background=random';
                                    }
                                @endphp
                                @foreach ($Slide as $item)
                                    <tr>
                                        <td scope="row">{{$i++}}</td>
                                        <td>{{$item->ten}}</td>
                                        <td>{{$item->noidung}}</td>
                                        <td>
                                            <img width="100px" src="{!! asset('image/'.$item->hinh) !!}" />
                                        </td>
                                        <td>{{$item->link}}</td>
                                        <td>
                                            {{--                                            <a target="_blank" href="sua/{{$item->id}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">--}}
                                            <a href="{{route('update.slide',['id'=>$item])}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip"  data-original-title="Sửa">
                                                <i class="fa fa-pen-alt" style="color: #35cc3a;"></i>
                                            </a>
                                            <a href="{{route('delete.slide',['id'=>$item])}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip"  data-original-title="Xóa ">
                                                <i class="far fa-trash-alt" style="color: #ea0c0c;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div style=" display: flex; align-items: center; justify-content: center; ">
                                {{$Slide->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
