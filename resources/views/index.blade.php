@extends('layouts.master')
@section('title')
    Wanderlust
@endsection
@section('specific_css')
    <link href={{ asset('assets/css/home_1.css') }} rel="stylesheet">
@endsection
@section('specific_js')
    <script src={{asset('assets/js/carousel-home.min.js')}}></script>
@endsection
@section('content')

    <div id="page">
        <!-- /header -->
        <main>
            <div id="carousel-home">
                <div class="owl-carousel owl-theme">
                    <div class="owl-slide cover"
                         style="background-image: url(https://res.cloudinary.com/vernom/image/upload/c_scale,h_750,w_1450/v1596632621/perfume_project/sauvage_index_kvsxtv.jpg); height: 850px">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
                            <div class="container">
                                <div class="row justify-content-center justify-content-md-end">
                                    <div class="col-lg-6 static">
                                        <div class="slide-text text-right white">
                                            <h2 class="owl-slide-animated owl-slide-title">Sauvage<br>the new parfume
                                            </h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                A powerfully fresh trail, wild and noble all at once.
                                            </p>
                                            <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                             href="/product/sauvage_p"
                                                                                             role="button">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                    <div class="owl-slide cover"
                         style="background-image: url(https://res.cloudinary.com/vernom/image/upload/c_scale,h_750,w_1450/v1596633226/perfume_project/dior_index_3_gc1umg.jpg); height: 850px">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
                            <div class="container">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-6 static">
                                        <div class="slide-text white">
                                            <h2 class="owl-slide-animated owl-slide-title">Sauvage<br>eau de toilette
                                            </h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                Powerful & juicy freshness with a woody amber trail
                                            </p>
                                            <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                             href="/product/sauvage_edt"
                                                                                             role="button">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                    <div class="owl-slide cover"
                         style="background-image: url(https://res.cloudinary.com/vernom/image/upload/c_scale,h_850,w_1400/v1596633006/perfume_project/dior_index_2_vh9tig.jpg); height: 850px;">
                        <div class="opacity-mask d-flex align-items-center"
                             data-opacity-mask="rgba(255, 255, 255, 0.3)">
                            <div class="container">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-12 static">
                                        <div class="slide-text text-center black">
                                            <h2 class="owl-slide-animated owl-slide-title">Sauvage<br>eau de parfum
                                            </h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                spicy freshness with a woody trail envelopped in vanilla absolute
                                            </p>
                                            <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                                                             href="/product/sauvage_edp"
                                                                                             role="button">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/owl-slide-->
                    </div>
                </div>
                <div id="icon_drag_mobile"></div>
            </div>
            <!--/carousel-->

            <ul id="banners_grid" class="clearfix">
                <li>
                    <a href="{{route('female_product')}}" class="img_container">
                        <img
                                src='https://res.cloudinary.com/vernom/image/upload/c_scale,w_700/v1596722168/perfume_project/female_ueuy87.png'
                                data-src="https://res.cloudinary.com/vernom/image/upload/c_scale,w_700/v1596722168/perfume_project/female_ueuy87.png"
                                alt="" class="lazy">
                        <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                            <h3>BST N???</h3>
                            <div><span class="btn_1">Xem ngay</span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('male_product')}}" class="img_container">
                        <img
                                src='https://res.cloudinary.com/vernom/image/upload/v1596722166/perfume_project/male_hy7gxe.jpg'
                                data-src="https://res.cloudinary.com/vernom/image/upload/v1596722166/perfume_project/male_hy7gxe.jpg"
                                alt="" class="lazy">
                        <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                            <h3>BST Nam</h3>
                            <div><span class="btn_1">Xem ngay</span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('unisex_product')}}" class="img_container">
                        <img
                                src='https://res.cloudinary.com/vernom/image/upload/v1596722169/perfume_project/unisex_phbqbj.jpg'
                                data-src="https://res.cloudinary.com/vernom/image/upload/v1596722169/perfume_project/unisex_phbqbj.jpg"
                                alt="" class="lazy">
                        <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                            <h3>BST ??a gi???i</h3>
                            <div><span class="btn_1">Xem ngay</span></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!--/banners_grid -->

            <div class="container margin_60_35">
                <div class="main_title">
                    <h2>B??n ch???y nh???t</h2>
                    <span>C??c s???n ph???m</span>
                    <p>C??c th????ng hi???u n?????c hoa ???????c feedback nhi???u nh???t t???i Vi???t Nam</p>
                </div>
                <div class="row small-gutters">
                    @foreach($products as $product)
                        <div class="col-6 col-md-4 col-xl-3">
                            <div class="grid_item">
                                <figure>
                                    <a href="{{route('product_detail',$product->slug)}}">
                                        <img class="img-fluid lazy"
                                             src="{{$product->firstThumbnail}}" data-src="{{$product->firstThumbnail}}"
                                             alt="">
                                    </a>
                                </figure>
                                <a href="product-detail-1.html">
                                    <h3>{{$product->name}}</h3>
                                </a>
                                <div class="price_box">
                                    <span class="new_price">{{$product->price}}</span>
                                </div>
                            </div>
                            <!-- /grid_item -->
                        </div>
                @endforeach
                <!-- /col -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->

            <div class="featured lazy"
                 data-bg="url(https://res.cloudinary.com/vernom/image/upload/v1596722751/perfume_project/another_13_uxtbu1.jpg)">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container margin_60">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 wow" data-wow-offset="150">
                                <h3>Le Labo<br>Another 13</h3>
                                <p>????n ??ng l?? kh??ng s??? n???ng</p>
                                <div class="feat_text_block">
                                    <div class="price_box">
                                        <span class="new_price">6.000.000???</span>
                                        <span class="old_price">6.500.000???</span>
                                    </div>
                                    <a class="btn_1" href="/product/another_13_edp" role="button">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /featured -->


            <div class="bg_gray">
                <div class="container margin_30">
                    <div id="brands" class="owl-carousel owl-theme">
                        @foreach ($brands as $brand)
                            <div class="item">
                                <a href="#{{$brand->brand_name}}"><img
                                            src={{$brand->ImageSize600x600}} data-src="{{$brand->ImageSize600x600}}"
                                            alt="" class="owl-lazy"></a>
                            </div><!-- /item -->
                        @endforeach
                    </div><!-- /carousel -->
                </div><!-- /container -->
            </div>
            <!-- /bg_gray -->

            <div class="container margin_60_35">
                <div class="main_title">
                    <h2>Tin m???i nh???t</h2>
                    <span>Blog</span>
                    <p>C??c b??i blog v??? ch??? ????? n?????c hoa</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <a class="box_news" href="blog.html">
                            <figure>
                                <img
                                        src='https://res.cloudinary.com/vernom/image/upload/c_scale,h_266,w_400/v1596800928/perfume_project/article/1_byoh6y.jpg'
                                        alt="" width="400" height="266" class="lazy">
                                <figcaption><strong>07</strong>Aug</figcaption>
                            </figure>
                            <ul>
                                <li>Ho??ng Tr???n</li>
                                <li>07.08.2020</li>
                            </ul>
                            <h4>Fucking Fabulous ??? khi t??nh y??u tr??? n??n m?? qu??ng</h4>
                            <p>Th???t ????ng bu???n c?????i khi con ng?????i ta li??n t???c c???m th???y h???i h???n v??....</p>
                        </a>
                    </div>
                    <!-- /box_news -->
                    <div class="col-lg-6">
                        <a class="box_news" href="blog.html">
                            <figure>
                                <img
                                        src='https://res.cloudinary.com/vernom/image/upload/c_scale,h_266,w_400/c_scale,h_266,w_400/v1596800928/perfume_project/article/2_us9yma.jpg'
                                        alt="" width="400" height="266" class="lazy">
                                <figcaption><strong>07</strong>Aug</figcaption>
                            </figure>
                            <ul>
                                <li>Kh??nh Nam</li>
                                <li>07.08.2020</li>
                            </ul>
                            <h4>N?????c hoa v?? th??? thu???t giao ti???p</h4>
                            <p>???n sau nh???ng n???t h????ng nh?? nh???, v???n v????ng l?? c??? m???t th??? gi???i tr??n ?????y b?? ???n....</p>
                        </a>
                    </div>
                    <!-- /box_news -->
                    <div class="col-lg-6">
                        <a class="box_news" href="blog.html">
                            <figure>
                                <img
                                        src='https://res.cloudinary.com/vernom/image/upload/c_scale,h_266,w_400/v1596800930/perfume_project/article/3_ffvjlv.jpg'
                                        alt="" width="400" height="266" class="lazy">
                                <figcaption><strong>07</strong>Aug</figcaption>
                            </figure>
                            <ul>
                                <li>????? Th??i</li>
                                <li>07.08.2020</li>
                            </ul>
                            <h4>B??? s??u t???p Gucci Bloom, khi v??? ?????p c???a hoa Hu??? ???????c t??n vinh</h4>
                            <p>Th??ng 8 n??m 2017, Gi??m ?????c s??ng t???o Alessandro Michele v???i n??t m???t r???ng r???, h???nh
                                ph??c....</p>
                        </a>
                    </div>
                    <!-- /box_news -->
                    <div class="col-lg-6">
                        <a class="box_news" href="blog.html">
                            <figure>
                                <img
                                        src='https://res.cloudinary.com/vernom/image/upload/c_scale,h_266,w_400/v1596800929/perfume_project/article/4_yxxipn.jpg'
                                        alt="" width="400" height="266" class="lazy">
                                <figcaption><strong>06</strong>Aug</figcaption>
                            </figure>
                            <ul>
                                <li>B?? L??m</li>
                                <li>06.08.2020</li>
                            </ul>
                            <h4>Alaia ??? M??i h????ng c???a k?? ???c, t??nh y??u v?? n???i nh???</h4>
                            <p>Th???t d??? ????? y??u ai ???? khi h??? ???? tr??? th??nh m???t ph???n c???a k?? ???c, nh??ng th???t kh??....</p>
                        </a>
                    </div>
                    <!-- /box_news -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </main>
        <!-- /main -->



@endsection
