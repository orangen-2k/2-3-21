@extends('user.user')
@section('content-user')
    <div class="container">
        <div class="row">
            <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="post-6 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div class="entry-summary">
                            <div class="vc_row vc_row-fluid">
                                <div class="container float vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div style="
												height: 100%;
												display: flex;
												align-items: center;
												justify-content: center;
											" class="vc_row vc_inner vc_row-fluid margin-bottom-30">


                                                <div class="wrap-slider vc_column_container vc_col-sm-10">
                                                    <div class="vc_column-inner homepage2_custom">
                                                        <div class="wpb_wrapper">
                                                            <!-- OWL SLIDER -->
                                                            <div class="wpb_revslider_element wpb_content_element no-margin">
                                                                <div class="vc_column-inner ">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="wpb_revslider_element wpb_content_element" style="margin-left: 6%;">
                                                                            <div id="main-slider" class="fullwidthbanner-container" style="position:relative; width:90%; height:auto; margin-top:0px; margin-bottom:0px">
                                                                                <div class="module slideshow no-margin">
                                                                                    @include('user.layout.slide')
                                                                                </div>
                                                                                <div class="loadeding"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- OWL LIGHT SLIDER -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="vc_row vc_row-fluid margin-bottom-30">
                                <div class="vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class=" wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <div class="wrap-transport">
                                                        <div class="row">
                                                            <div class="item item-1 col-lg-3 col-md-3 col-sm-6">
                                                                <a href="#" class="wrap">
                                                                    <div class="icon">
                                                                        <i class="fa fa-paper-plane"></i>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h3>Thông tin mới nhất</h3>
                                                                        <p>Luôn luôn cống hiến</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="item item-2 col-lg-3 col-md-3 col-sm-6">
                                                                <a href="#" class="wrap">
                                                                    <div class="icon">
                                                                        <i class="fa fa-map-marker"></i>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h3>Thông tin chính xác</h3>
                                                                        <p>Luôn luôn tận tâm</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="item item-3 col-lg-3 col-md-3 col-sm-6">
                                                                <a href="#" class="wrap">
                                                                    <div class="icon">
                                                                        <i class="fa fa-tag"></i>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h3>Thông tin quan tâm</h3>
                                                                        <p>Luôn luôn lắng nghe</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="item item-4 col-lg-3 col-md-3 col-sm-6">
                                                                <a href="#" class="wrap">
                                                                    <div class="icon">
                                                                        <i class="fa fa-life-ring"></i>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h3>Thông tin mở rộng</h3>
                                                                        <p>Luôn luôn hoạt động</p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="listings-title">
                                <div class="container">
                                    <div class="wrap-title">
                                        <h1>Blog</h1>
                                        <div class="bread">
                                            <div class="breadcrumbs theme-clearfix">
                                                <div class="container">
                                                    <ul class="breadcrumb">
                                                        <li>
                                                            <a href="home_page_1.html">Home</a>
                                                            <span class="go-page"></span>
                                                        </li>

                                                        <li class="active">
                                                            <span>Blog</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="container">
                                <div class="row">
                                    <div class="category-contents col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                        <div class="listing-title">
                                            <h1><span>Blog</span></h1>
                                        </div>

                                        <div class="blog-content blog-content-list">
                                            <div id="post-01" class="clearfix post type-post status-publish format-standard has-post-thumbnail hentry category-blog tag-couples tag-wedding">
                                                <div class="entry clearfix">
                                                    @foreach($Theloaihome as $item)
                                                        @if(count($item->loaitin) > 0)
                                                            <?php $data = $item->tintuc->where('noibat',1)->sortByDesc('created_at')->take(2);?>
                                                            @foreach($data->all() as $tintuc)
                                                                <div class="col-md-3">
                                                                    <div class="entry-thumb">
                                                                        <a class="entry-hover" href="{{route('detail.home',['id'=>$tintuc->id,'tinkhongdau'=>$tintuc->tieudekhongdau])}}" title="">
                                                                            <img width="200" height="210" src="{{asset('image/'.$tintuc->hinh)}}" class="attachment-large size-large wp-post-image" style="width: 190px;height: 150px;margin: 32px 0px 0px 0px;" sizes="(max-width: 370px) 100vw, 370px">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="entry-content">
                                                                    <div class="content-top clearfix">
                                                                        <div class="content-top-in">
                                                                            <div class="entry-meta clearfix">
                                                                                <div class="meta-entry entry-date pull-left">
                                                                                    <i class="fa fa-calendar"></i>Ngày đăng:
                                                                                    <span class="month-time"><a href="{{route('detail.home',['id'=>$tintuc->id,'tinkhongdau'=>$tintuc->tieudekhongdau])}}">{{$tintuc->created_at}}</a></span>
                                                                                </div>

                                                                                <div class="meta-entry entry-category pull-left">
                                                                                    <i class="fa fa-folder-open"></i>Thể loại : <a href="{{route('detail.home',['id'=>$tintuc->id,'tinkhongdau'=>$tintuc->tieudekhongdau])}}" rel="category">{{$item->ten}}</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="entry-title">
                                                                                <h4><a href="{{route('detail.home',['id'=>$tintuc->id,'tinkhongdau'=>$tintuc->tieudekhongdau])}}">{{$tintuc->loaitin->ten}}</a></h4>
                                                                                <div>
                                                                                    <div class="col-md-8">
                                                                                        <h5>{{$tintuc->tieude}}</h5>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <img style="width: 40px;" src="https://file4.batdongsan.com.vn/2019/06/07/20190607141654-cfb4_wm.jpg" />
                                                                                    </div>
                                                                                </div>
                                                                            </div><br/><br/>
                                                                        </div>

                                                                        <div class="entry-summary">
                                                                            {{$tintuc->tomtat}}
                                                                        </div>
                                                                    </div>

                                                                    <div class="readmore">
                                                                        <a href="{{route('detail.home',['id'=>$tintuc->id,'tinkhongdau'=>$tintuc->tieudekhongdau])}}"><i class="fa fa-caret-right"></i>Đọc thêm</a>
                                                                    </div>
                                                                </div><br/><br/><br/><br/>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>


                                        <div style=" display: flex; align-items: center; justify-content: center; ">
                                            {{$Theloaihome->links()}}
                                        </div>
                                    </div>

                                    <aside id="left" class="sidebar col-lg-3 col-md-4 col-sm-4">
                                                    <div class="row main-menu">
                                                        <div id="m_ver_menu" class="m-aside-menu" >
                                                            <ul class="m-menu__nav list-group" id="menu" >
                                                                @include('user.layout.sidebar')
                                                            </ul>
                                                        </div>
                                                    </div>
                                        <div class="widget-2 widget text-9 widget_text">
                                            <div class="widget-inner">
                                                <div class="textwidget">
                                                    <div class="banner-sidebar">
                                                        <img src="/images-user/1903/banner-detail.jpg" title="banner" alt="banner">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                </div>
                            </div>

                            <br/><br/><br/>
                            <div class="vc_row vc_row-fluid">
                                <div class="vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div id="sw_brand_01" class="responsive-slider sw-brand-container-slider clearfix" data-lg="5" data-md="4" data-sm="3" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
                                                <div class="resp-slider-container">
                                                    <div class="slider responsive">
                                                        <div class="item item-brand-cat">
                                                            <div class="item-image">
                                                                <a href="#">
                                                                    <img width="173" height="88" src="/images-user/1903/Brand_1.jpg" class="attachment-173x91 size-173x91" alt="" />
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="item item-brand-cat">
                                                            <div class="item-image">
                                                                <a href="#">
                                                                    <img width="173" height="91" src="/images-user/1903/br1.jpg" class="attachment-173x91 size-173x91" alt="" />
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="item item-brand-cat">
                                                            <div class="item-image">
                                                                <a href="#">
                                                                    <img width="173" height="91" src="/images-user/1903/br2.jpg" class="attachment-173x91 size-173x91" alt="" />
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="item item-brand-cat">
                                                            <div class="item-image">
                                                                <a href="#">
                                                                    <img width="173" height="91" src="/images-user/1903/br4.jpg" class="attachment-173x91 size-173x91" alt="" />
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="item item-brand-cat">
                                                            <div class="item-image">
                                                                <a href="#">
                                                                    <img width="173" height="91" src="/images-user/1903/br5.jpg" class="attachment-173x91 size-173x91" alt="" />
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="item item-brand-cat">
                                                            <div class="item-image">
                                                                <a href="#">
                                                                    <img width="173" height="91" src="/images-user/1903/br3.jpg" class="attachment-173x91 size-173x91" alt="" />
                                                                </a>
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

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
