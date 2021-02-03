@extends('user.user') @section('title', "Chi tiết bảng tin") @section('content-user')
    <div class="container">
        <div class="wrap-title">
            <h1>{{$Tintuc->tieude}}</h1>
            <div class="bread">
                <div class="breadcrumbs theme-clearfix">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="{{route('user.home')}}">Trang  chủ</a><span class="go-page"></span></li>
                            <li class="active"><span>{{$Tintuc->loaitin->theloai->ten}}</span></li>
                            <li><a href="{{route('loaitin.home',['id'=>$Tintuc->loaitin->theloai->id,'tenkhongdau'=>$Tintuc->loaitin->theloai->tenkhongdau])}}">{{$Tintuc->loaitin->ten}}</a><span class="go-page"></span></li>
                            <li class="active"><span>{{$Tintuc->tieude}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="single main col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="post type-post status-publish format-image hentry category-post-format post_format-post-format-image">
                    <div class="entry-wrap">
                        <div class="entry-content clearfix">
                            <div class="content-single-top">
                                <div class="entry-meta clearfix">
                                    <div class="meta-entry entry-date pull-left">
                                        <i class="fa fa-calendar"></i>
                                        <span class="month-time"><a href="post_format_image.html">{{$Tintuc->created_at}}</a></span>
                                    </div>

                                    <div class="entry-comment meta-entry pull-left">
                                        <a href="#"><i class="fa fa-comments"></i>0  Comment</a>
                                    </div>

                                    <div class="meta-entry entry-category pull-left">
                                        <i class="fa fa-folder-open"></i>Categories : <a href="post_format_archive.html" rel="category">Post Format</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <p>
                                    <img class="alignnone size-full wp-image-405" src="{{asset('image/'.$Tintuc->hinh)}}" alt="6" width="1110" height="780">
                                    {!! $Tintuc->noidung !!}
                                </p>
                                <hr/>
                                <div id="respond">
                                    <div class="wp-comment">
                                        <h2 class="title">submit comment</h2>

                                        @if(session('Notification'))
                                            <div class="alert alert-success">
                                                {{session('Notification')}}
                                            </div>
                                        @endif
                                        <p class="cancel-comment-reply"><a rel="nofollow" id="cancel-comment-reply-link" href="https://demo.smartaddons.com/etro/?p=595#respond" style="display:none;">Click here to cancel reply.</a></p>

                                        <form action="{{route('comment.home',['id'=>$Tintuc])}}" method="post" id="commentform" name="commentform" class="form-horizontal row-fluid">
                                            <input  type="hidden" name="_token" value="{{csrf_token()}}"/>
                                            <div class="cmm-box-bottom clearfix">
                                                <div class="control-group your-comment">
                                                    <div class="controls">
                                                        <textarea name="Noidung" placeholder="Your Comment *" id="comment" class="input-block-level" rows="7" tabindex="4" aria-required="true"></textarea>
                                                    </div>
                                                </div>

                                                <input type="submit" class="btn btn-default" value="Đăng comment" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="authorDetails" class="clearfix">
                                    @foreach($Tintuc->comment as $item)
                                        <div class="authorDetail">
                                            <p>{{$item->user->name}}</p>
                                            <div class="avatar">
                                                <img alt="" src="/images-user/1903/5-1.jpg" class="avatar pull-left media-object avatar-100 photo" height="100" width="100">
                                            </div>

                                            <div class="infomation">
                                                <h4 class="name-author"><span>admin</span></h4>
                                                <p>{{$item->noidung}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3">
                                @foreach($Tinlienquan as  $item)
                                    <div class="category-contents col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row blog-content blog-content-grid">
                                            <div id="post-01" class=" clearfix post type-post status-publish format-standard has-post-thumbnail hentry category-blog tag-couples tag-wedding">
                                                {{--
                                                <div id="post-01" class="col-md-3 col-sm-6 col-xs-12 clearfix post type-post status-publish format-standard has-post-thumbnail hentry category-blog tag-couples tag-wedding">--}}
                                                <div class="entry clearfix">
                                                    <div class="entry-thumb">
                                                        <a class="entry-hover" href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}" title="Jordy Vanden Nieuwendijk">
                                                            <img style="width: max-content; height: 150px" src="{{asset('image/'.$item->hinh)}}" class="attachment-large size-large wp-post-image" sizes="(max-width: 870px) 100vw, 870px">
                                                        </a>
                                                    </div>
                                                    <div class="entry-content">
                                                        <div class="content-top clearfix">
                                                            <div class="content-top-in">
                                                                <div class="entry-meta clearfix">
                                                                    <div class="meta-entry entry-date pull-left">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <span class="month-time"><a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}">{{$item->created_at}}</a></span>
                                                                    </div>

                                                                    <div class="meta-entry entry-category pull-left">
                                                                        <i class="fa fa-folder-open"></i>Categories : <a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}" rel="category">Blog</a>
                                                                    </div>
                                                                </div>

                                                                <div class="entry-title">
                                                                    <h4><a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}">{{$item->tieude}}</a></h4>
                                                                </div>

                                                                <div class="entry-meta clearfix">
                                                                    <div class="entry-comment meta-entry">
                                                                        <a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}">
                                                                            <i class="fa fa-comments"></i>6 Comments
                                                                        </a>
                                                                    </div>

                                                                    <div class="entry-meta-link entry-meta-tag meta-entry">
                                                                        <i class="fa fa-tags"></i>
                                                                        <a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}" rel="tag">Couples</a>,
                                                                        <a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}" rel="tag">Wedding</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="readmore">
                                                            <a href="{{route('detail.home',['id'=>$item->id,'tinkhongdau'=>$item->tieudekhongdau])}}"><i class="fa fa-caret-right"></i>Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
