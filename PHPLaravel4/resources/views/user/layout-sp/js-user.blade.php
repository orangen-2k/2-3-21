<script type="text/javascript" src="{!! asset('js-user/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/jquery-migrate.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/js.cookie.min.js') !!}"></script>

<!-- OPEN LIBS JS -->
<script type="text/javascript" src="{!! asset('js-user/owl.carousel.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/slick.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('js-user/jquery.colorbox-min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/isotope.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/jquery.fancybox.pack.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/category-ajax.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/jquery.countdown.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/js_composer_front.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('js-user/plugins.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/megamenu.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js-user/main.min.js') !!}"></script>

<script type="text/javascript">
    var sticky_navigation_offset_top = $("#header .header-bottom").offset().top;
    var sticky_navigation = function() {
        var scroll_top = $(window).scrollTop();
        if (scroll_top > sticky_navigation_offset_top) {
            $("#header .header-bottom").addClass("sticky-menu");
            $("#header .header-bottom").css({
                "top": 0,
                "left": 0,
                "right": 0
            });
        } else {
            $("#header .header-bottom").removeClass("sticky-menu");
        }
    };
    sticky_navigation();
    $(window).scroll(function() {
        sticky_navigation();
    });

    $(document).ready(function() {
        $(".show-dropdown").each(function() {
            $(this).on("click", function() {
                $(this).toggleClass("show");
                var $element = $(this).parent().find("> ul");
                $element.toggle(300);
            });
        });
    });
</script>

<script src="{!! asset('js/all.js') !!}" type="text/javascript"></script>

<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
