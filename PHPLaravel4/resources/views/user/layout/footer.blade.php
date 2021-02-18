<footer id="footer" class="footer default theme-clearfix">
    <!-- Content footer -->
    <div class="container">
        <div class="vc_row vc_row-fluid footer-style2">
            <div class="vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-2 vc_col-xs-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="vc_wp_custommenu wpb_content_element">
                            <div class="widget widget_nav_menu">
                                <h2 class="widgettitle">Hỗ trợ</h2>
                                <div class="hethong_ks">
                                    <div class="hethong_ks_in">
                                        <div class="fb-page" data-href="https://www.facebook.com/fcode.community/"
                                            data-width="341" data-small-header="false"
                                            data-adapt-container-width="false" data-hide-cover="false"
                                            data-show-facepile="false"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-2 vc_col-xs-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class=" wpb_content_element ">
                            <div class="wpb_wrapper">
                                <div class="infomation">
                                    <h2>THÔNG TIN LIÊN LẠC</h2>

                                    <div class="info-support">
                                        <ul>
                                            <li>Thôn 7 - Trung Châu - Đan Phượng - Hà Nội</li>
                                            <li>0963328520</li>
                                            <li>orangen2000@gmail.com</li>
                                        </ul>
                                    </div>

                                    <div class="shop-social">
                                        <ul>
                                            <li><a href="https://www.facebook.com/"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="https://plus.google.com/"><i
                                                        class="fab fa-google-plus-g"></i></a></li>
                                            <li><a href="https://www.linkedin.com/"><i
                                                        class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="https://www.pinterest.com/"><i
                                                        class="fab fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-2 vc_col-xs-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="wpb_text_column wpb_content_element ">
                            <div class="wpb_wrapper">
                                <div class="wrap-newletters">
                                    <h3>BẢN TIN</h3>

                                    <div class="info-newsletter">

                                        <p>Đăng ký ngay để nhận được các thông tin và thông báo mới nhất.
                                            Đăng ký ngay !</p>

                                        <div class="mc4wp-form">
                                            <div class="newsletter-content">
                                                <form action="{{route('add.email.new')}}" method="POST">
                                                    @if(count($errors) > 0)
                                                        <div class="alert alert-danger">
                                                            @foreach($errors->all() as $err)
                                                                {{$err}}<br/>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    <input type="email" class="newsletter-email" name="emailmew"
                                                        placeholder="Email của bạn" />
                                                    <input class="newsletter-submit" type="submit" value="Gửi" />
                                                </form>
                                            </div>
                                        </div>

                                        <div class="store">
                                            <a >
                                                <img title="store" src="/images-user//1903/pay2.png" alt="store" />
                                            </a>

                                            <a >
                                                <img title="store" src="/images-user//1903/pay3.png" alt="store" />
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
        <br />

    </div>

    <div class="footer-copyright style1">
        <div class="container">
            <!-- Copyright text -->
            <div class="copyright-text pull-left">
                <p>Sản phẩm được tìm kiếm và chọn lọc bởi <a href="http://www.smartaddons.com/">Nguyễn Quyết Chiến</a>.
                </p>
            </div>

            <div class="sidebar-copyright pull-right">
                <div class="widget-1 widget-first widget text-4 widget_text">
                    <div class="widget-inner">
                        <div class="textwidget">
                            <div class="payment">
                                <a href="#">
                                    <img src="/images-user//1903/paypal.png" alt="payment" title="payment" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<a id="etrostore-totop" href="#"></a>
