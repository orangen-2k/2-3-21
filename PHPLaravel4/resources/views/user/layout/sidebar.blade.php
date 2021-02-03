<li href="" class="list-group-item active">
    Memu
</li>
@foreach($Category as $item)
    @if(count($item->loaitin) > 0)
        <li href="" class="m-menu__item m-menu__item--submenu list-group-item">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                {{$item->ten}}
            </a>
            <div class="m-menu__submenu ">
                <ul>
                    @foreach($item->loaitin as $item_lt)
                        <a href="{{route('loaitin.home',['id'=>$item_lt,'tenkhongdau'=>$item_lt->tenkhongdau])}}">
                            <li class="list-group-item">
                                {{$item_lt->ten}}
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </li>
    @endif
@endforeach
