<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title','Wanderlust') </title>

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
          href={{ asset('assets/img/apple-touch-icon-57x57-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href={{ asset('assets/img/apple-touch-icon-72x72-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href={{ asset('assets/img/apple-touch-icon-114x114-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href={{ asset('assets/img/apple-touch-icon-144x144-precomposed.png') }}>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href={{ asset('assets/css/bootstrap.custom.min.css') }} rel="stylesheet">
    {{--	<link href={{ URL::asset('assets/css/bootstrap.custom.min.css') }} rel="stylesheet">--}}
    <link href={{ asset('assets/css/style.css') }} rel="stylesheet">

    <!-- SPECIFIC CSS -->
    @yield('specific_css')

<!-- YOUR CUSTOM CSS -->
    {{--    <link href={{ asset('assets/css/custom.css') }} rel="stylesheet">--}}
    <link href={{ asset('assets/css/custom-hung.css') }} rel="stylesheet">
</head>

<body>

@include('layouts.menu_bar')

<!--content Start-->
@yield('content')

<!--content End-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_1">V??? Wanderlust</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="/about_us">Gi???i thi???u v??? Wanderlust</a></li>
                        <li><a href="/blog">Di???n ????n chuy??n gia n?????c hoa</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_2">D???ch v???</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>
                        <li><a href="/faq">C??c c??u h???i th?????ng g???p</a></li>
                        {{-- Frequently Asked Questions - FAQ --}}
                        <li><a href="/ordering_guide">H?????ng d???n ?????t h??ng</a></li>
                        <li><a href="/mode_of_transportation">Ph????ng th???c v???n chuy???n</a></li>
                        <li><a href="/payment_methods">Ph????ng th???c thanh to??n</a></li>
                        <li><a href="/policy">Ch??nh s??ch</a></li>
                        {{--                        <li><a href="">Ch??nh s??ch gi?? c???</a></li>--}}
                        {{--                        <li><a href="">Ch??nh s??ch ?????i tr???</a></li>--}}
                        {{--                        <li><a href="">Ch??nh s??ch b???o m???t</a></li>--}}
                        <div class="collapse dont-collapse-sm links" id="collapse_2">
                            <ul>
                                <li><a href="/service">Trang d???ch v???</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_3">Li??n h???</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>S??? 8 T??n Th???t Thuy???t<br>H?? N???i - Vi???t Nam</li>
                        <li><i class="ti-mobile"></i>+84 123-456-789</li>
                        <li><i class="ti-email"></i><a href="#0">t1908e@fpt.edu.vn</a></li>

                        <div class="collapse dont-collapse-sm links" id="collapse_2">
                            <ul>
                                <li><a href="/contact">Trang li??n h???</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_4">C?? g?? m???i</h3>
                <h5 class="keep-contact">????ng k?? ????? nh???n th??ng tin khuy???n m??i m???i nh???t!!</h5>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter"
                                   class="form-control" placeholder="Nh???p Email">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Theo d??i ???ng h??? Wanderlust</h5>
                        <ul>
                            <li><a href="#0"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="assets/img/twitter_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="assets/img/facebook_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="assets/img/instagram_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="assets/img/youtube_icon.svg" alt="" class="lazy"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
                    <li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="Vietnamese" selected>Vietnamese</option>
                                <option value="French">French</option>
                                <option value="English">English</option>
                                <option value="Russian">Russian</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select currency-selector">
                            <select>
                                <option value="VND" selected>VND</option>
                                <option value="Euro">Euro</option>
                            </select>
                        </div>
                    </li>
                    <li><img
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                            data-src="assets/img/cards_all.svg" alt="" width="198" height="30" class="lazy">
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="#0">C??c ??i???u kho???n v?? ??i???u ki???n</a></li>
                    <li><a href="#0">B???o m???t</a></li>
                    <li><span>?? 2020 Wanderlust</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
</div>
<!-- page -->

<div id="toTop"></div><!-- Back to top button -->
<!-- COMMON SCRIPTS -->
<script src={{asset('assets/js/common_scripts.min.js')}}></script>
<script src={{asset('assets/js/main.js')}}></script>

<!-- SPECIFIC SCRIPTS -->
@yield('specific_js')

</body>
