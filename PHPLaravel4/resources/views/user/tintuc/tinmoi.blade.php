@extends('user.user') @section('content-user') @section('title','Danh sách các tin mới nhất')
<div class="container">
    <div class="row">
        <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="post-6 page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="entry-summary">
                        <div class="container">
                            <div class="wrap-title">
                                <h1>Danh sách các tin mới nhất</h1>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="category-contents col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                    <div class="blog-content blog-content-list">
                                        <div id="post-01"
                                            class="clearfix post type-post status-publish format-standard has-post-thumbnail hentry category-blog tag-couples tag-wedding">
                                            <div class="entry clearfix">
                                                @foreach($Tintuc->sortByDesc('created_at') as $item)
                                                    <div class="col-md-3">
                                                        <div class="entry-thumb">
                                                            <a class="entry-hover" href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}" title="">
                                                                <img width="200" height="210" src="{{asset('image/'.$item->hinh)}}" class="attachment-large size-large wp-post-image" style="width: 190px;height: 150px;margin: 32px 0px 0px 0px;" sizes="(max-width: 370px) 100vw, 370px">
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="entry-content">
                                                        <div class="content-top clearfix">
                                                            <div class="content-top-in">
                                                                <div class="entry-meta clearfix">
                                                                    <div class="meta-entry entry-date pull-left">
                                                                        <i class="fa fa-calendar"></i>Ngày đăng:
                                                                        <span class="month-time"><a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}">{{$item->created_at}}</a></span>
                                                                    </div>

                                                                    <div class="meta-entry entry-category pull-left">
                                                                        <i class="fa fa-folder-open"></i>Thể loại : <a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}" rel="category">{{$item->loaitin->theloai->ten}}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="entry-title">
                                                                    <h4><a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}">{{$item->loaitin->ten}}</a></h4>
                                                                    <div>
                                                                        <div class="col-md-8">
                                                                            <h5>{{$item->tieude}}</h5>
                                                                        </div>
                                                                    </div>
                                                                </div><br/><br/>
                                                            </div>

                                                            <div class="entry-summary">
                                                                {{$item->tomtat}}
                                                            </div>
                                                        </div>

                                                        <div class="readmore">
                                                            <a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}"><i class="fa fa-caret-right"></i>Đọc thêm</a>
                                                        </div>
                                                    </div><br/><br/><br/><br/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div style="
												display: flex;
												align-items: center;
												justify-content: center;
											">
{{--                                        {{$Tintuc->links()}}--}}
                                    </div>
                                </div>

                                <aside id="left" class="sidebar col-lg-3 col-md-4 col-sm-4">
                                    <div class="row main-menu">
                                        <div id="m_ver_menu" class="m-aside-menu">
                                            <ul class="m-menu__nav list-group" id="menu">
                                                @include('user.layout.sidebar')
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget-2 widget text-9 widget_text">
                                        <div class="widget-inner">
                                            <div class="textwidget">
                                                <div class="banner-sidebar">
                                                    <img src="/images-user/1903/banner-detail.jpg" title="banner"
                                                        alt="banner">
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
                                        <div id="sw_brand_01"
                                            class="responsive-slider sw-brand-container-slider clearfix" data-lg="5"
                                            data-md="4" data-sm="3" data-xs="2" data-mobile="1" data-speed="1000"
                                            data-scroll="1" data-interval="5000" data-autoplay="false">
                                            <div class="resp-slider-container">
                                                <div class="slider responsive">
                                                    <div class="item item-brand-cat">
                                                        <div class="item-image">
                                                            <a href="#">
                                                                <img width="173" height="88"
                                                                    src="/images-user/1903/Brand_1.jpg"
                                                                    class="attachment-173x91 size-173x91" alt="" />
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="item item-brand-cat">
                                                        <div class="item-image">
                                                            <a href="#">
                                                                <img width="173" height="91"
                                                                    src="/images-user/1903/br1.jpg"
                                                                    class="attachment-173x91 size-173x91" alt="" />
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="item item-brand-cat">
                                                        <div class="item-image">
                                                            <a href="#">
                                                                <img width="173" height="91"
                                                                    src="/images-user/1903/br2.jpg"
                                                                    class="attachment-173x91 size-173x91" alt="" />
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="item item-brand-cat">
                                                        <div class="item-image">
                                                            <a href="#">
                                                                <img width="173" height="91"
                                                                    src="/images-user/1903/br4.jpg"
                                                                    class="attachment-173x91 size-173x91" alt="" />
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="item item-brand-cat">
                                                        <div class="item-image">
                                                            <a href="#">
                                                                <img width="173" height="91"
                                                                    src="/images-user/1903/br5.jpg"
                                                                    class="attachment-173x91 size-173x91" alt="" />
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="item item-brand-cat">
                                                        <div class="item-image">
                                                            <a href="#">
                                                                <img width="173" height="91"
                                                                    src="/images-user/1903/br3.jpg"
                                                                    class="attachment-173x91 size-173x91" alt="" />
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
