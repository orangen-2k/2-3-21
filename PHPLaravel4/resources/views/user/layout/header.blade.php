<header id="header" class="header header-style2">
    <div class="header-top clearfix">
        <div class="container">
            <div class="rows">
                <!-- SIDEBAR TOP MENU -->
                <div class="pull-left top1">
                    <div class="widget text-2 widget_text pull-left">
                        <div class="widget-inner">
                            <div class="textwidget">
                                <div class="call-us"><span>Liên hệ với tôi: </span> 09 6332 8520</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-myacc pull-right">
                    @if(!Auth::check())
                    <div class="sidebar-account pull-left">
                        <a href="{{route('login')}}">
                            <div class="account-title">Đăng nhập</div>
                        </a>
                    </div>
                    <div class="pull-left top2">
                        <div class="widget-1 widget-first widget nav_menu-2 widget_nav_menu">
                            <div class="widget-inner">
                                <ul id="menu-checkout" class="menu">
                                    <li class="menu-checkout">
                                        <a class="item-link" href="{{route('register')}}">
                                            <span class="menu-title">Đăng ký</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="sidebar-account pull-left">
                        <a href="{{route('user.home')}}">
                            <div class="account-title">Người dùng: {{ Auth::user()->name }}</div>
                        </a>
                    </div>

                    <div class="pull-left top2">
                        <div class="widget-1 widget-first widget nav_menu-2 widget_nav_menu">
                            <div class="widget-inner">
                                <ul id="menu-checkout" class="menu">
                                    <li class="menu-checkout">
                                        <a class="item-link" href="{{url('logout')}}">
                                            <span class="menu-title">Đăng xuất</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="header-mid clearfix">
        <div class="container">
            <div class="rows">
                <!-- LOGO -->
                <div class="etrostore-logo pull-left">
                    <a href="home_page_1.html">
                        <img src="/images-user/icons/logo-orange.png" alt="Shoopy">
                    </a>
                </div>

                <div class="mid-header2 pull-right">
                    <div class="widget-1 widget-first widget sw_top-6 sw_top">
                        <div class="widget-inner">
                            <div class="top-form top-search">
                                <div class="topsearch-entry">
                                    <form action="/timkiem" method="post" role="search">
                                        <input type="hidden" name="_token"value="{{csrf_token()}}" />
                                        <input type="text" value="" name="Tukhoa" placeholder="Nhập từ bạn muốn tìm...">
                                        <div class="cat-wrapper">
                                            <label class="label-search">
                                                <select name="search_category" class="s1_option">
                                                    <option value="">Danh sách thể loại</option>
                                                    @foreach ($Category as $item)
                                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                        <button type="submit" title="Search" class="fas fa-search"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget_sp_image-2 widget_sp_image pull-right">
                        <div class="widget-inner">
                            <img width="481" height="390" alt="" class="attachment-full" style="max-width: 100%;" src="/images-user/1903/imac.png">
                            <div class="widget_sp_image-description">
                                <p>
                                    <a href="simple_product.html">
                                        <br> Up To <span>80%</span> Off
                                        <br>
                                        <span>Cyber Monday 2</span> Sale!
                                        <br>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom clearfix" style="height: 60px;top: 0px;left: 0px;right: 0px;">
        <div class="container">
            <div class="rows">
                <!-- Primary navbar -->
                <div id="main-menu" class="main-menu pull-left">
                    <nav id="primary-menu" class="primary-menu">
                        <div class="navbar-inner navbar-inverse">
                            <div class="resmenu-container">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#ResMenuprimary_menu">
                                    <span class="sr-only">Categories</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <div id="ResMenuprimary_menu" class="collapse menu-responsive-wrapper">
                                    <ul id="menu-primary-menu" class="etrostore_resmenu">
                                        <li class="res-dropdown menu-portfolios">
                                            <a class="item-link dropdown-toggle" href="{{route('show.home')}}">Trang chủ</a>
                                            <span class="show-dropdown"></span>

                                            <ul class="dropdown-resmenu">
                                                <li class="menu-portfolio-2-columns">
                                                    <a href="">Detail</a>
                                                </li>

                                                <li class="menu-portfolio-3-columns">
                                                    <a href="">Loai tin</a>
                                                </li>

                                                <li class="menu-portfolio-4-columns">
                                                    <a href="portfolios_four_columns.html">Portfolio 4 Columns</a>
                                                </li>

                                                <li class="menu-portfolio-masonry">
                                                    <a href="portfolios_masonry.html">Portfolio Masonry</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="res-dropdown menu-shop">
                                            <a class="item-link " href="{{route('tinmoi.home')}}">Tin mới nhất</a>

                                        </li>

                                        <li class="res-dropdown menu-smartphones-tablet">
                                            <a class="item-link " href="#">Smartphones & Tablet</a>

                                        </li>

                                        <li class="res-dropdown menu-blog">
                                            <a class="item-link" href="#">Blog</a>

                                        </li>

                                        <li class="menu-deals">
                                            <a class="item-link" href="deals.html">Deals</a>
                                        </li>



                                        <li class="menu-about-us">
                                            <a class="item-link" href="about_us.html">About Us</a>
                                        </li>

                                        <li class="menu-contact-us">
                                            <a class="item-link" href="contact_us.html">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <ul id="menu-primary-menu-1" class="nav nav-pills nav-mega etrostore-mega etrostore-menures">
                                <li class="dropdown menu-portfolios etrostore-menu-custom level1">
                                    <a href="{{route('show.home')}}" class="item-link dropdown-toggle">
                                            <span class="have-title">
													<span class="menu-title">Trang chủ</span>
                                            </span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="column-1 menu-portfolio-2-columns">
                                            <a href="">
                                                    <span class="have-title">
															<span class="menu-title">Detail</span>
                                                    </span>
                                            </a>
                                        </li>

                                        <li class="column-1 menu-portfolio-3-columns">
                                            <a href="">
                                                    <span class="have-title">
															<span class="menu-title">Loai tin</span>
                                                    </span>
                                            </a>
                                        </li>

                                        <li class="column-1 menu-portfolio-4-columns">
                                            <a href="portfolios_four_columns.html">
                                                    <span class="have-title">
															<span class="menu-title">Portfolio 4 Columns</span>
                                                    </span>
                                            </a>
                                        </li>

                                        <li class="column-1 menu-portfolio-masonry">
                                            <a href="portfolios_masonry.html">
                                                    <span class="have-title">
															<span class="menu-title">Portfolio Masonry</span>
                                                    </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown menu-shop etrostore-mega-menu level1 etrostore-menu-img">
                                    <a  href="{{route('tinmoi.home')}}" class="item-link ">
                                            <span class="have-title">
													<span class="menu-color" data-color="#f03442"></span>

                                            <span class="menu-img">
														<img src="/images-user/1903/icon-new-1.png" alt="Menu Image" />
													</span>

                                            <span class="menu-title">Tin mới nhất</span>
                                            </span>
                                    </a>


                                </li>

                                <li class="dropdown menu-smartphones-tablet etrostore-mega-menu level1">
                                    <a href="{{route('dondangky.home')}}" class="item-link">
                                            <span class="have-title">
													<span class="menu-color" data-color="#13528c"></span>
                                            <span class="menu-title">Đăng ký nhập học</span>
                                            </span>
                                    </a>
                                </li>

                                <li class="menu-deals etrostore-menu-custom level1 etrostore-menu-img">
                                    <a  href="{{route('tinnong.home')}}" class="item-link">
                                            <span class="have-title">
													<span class="menu-img">
														<img src="/images-user/1903/icon-hot.png" alt="Menu Image" />
													</span>

                                            <span class="menu-title">Tin nóng</span>
                                            </span>
                                    </a>
                                </li>

                                <li class="dropdown menu-blog etrostore-mega-menu level1">
                                    <a href="#" class="item-link">
                                            <span class="have-title">
													<span class="menu-title">Tin hàng ngày</span>
                                            </span>
                                    </a>

                                </li>
                                <li class="menu-about-us etrostore-menu-custom level1">
                                    <a href="about_us.html" class="item-link">
                                            <span class="have-title">
													<span class="menu-title">About Us</span>
                                            </span>
                                    </a>

                                </li>

                                <li class="menu-contact-us etrostore-menu-custom level1">
                                    <a href="contact_us.html" class="item-link">
                                            <span class="have-title">
													<span class="menu-title">Contact Us</span>
                                            </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
