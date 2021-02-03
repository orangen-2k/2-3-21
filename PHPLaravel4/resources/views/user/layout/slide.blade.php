@foreach($Slide as $item)
    <?php  ?>
    <div class="item">
        <a href=""><img src="{{asset('image/'.$item->hinh)}}" alt="slider1" class="img-responsive" height="559"></a>
    </div>
@endforeach
