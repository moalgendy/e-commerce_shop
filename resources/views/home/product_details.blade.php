<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <base href="/public">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="home/images/favicon.png" type="">
        <title>Famms - Fashion</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="home/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="home/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="home/css/responsive.css" rel="stylesheet" />

{{-- details form --}}
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="details/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="details/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="details/css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="details/css/nice-select.css" type="text/css">
<link rel="stylesheet" href="details/css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="details/css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="details/css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="details/css/style.css" type="text/css">



    </head>
    <body>

        @include('sweetalert::alert')

        <div class="hero_area">
            <!-- header section strats -->

            @include('home.header')
        <!-- Product Details Section Begin -->

        

            <section class="product-details spad">
                <div class="container">


                    @if (session()->has('message'))
                    
                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>

                    @endif


                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="product__details__pic">
                                <div class="product__details__pic__item">
                                    <img class="product__details__pic__item--large"
                                        src="product/{{ $details->image }}" alt="">
                                </div>
                                {{-- <div class="product__details__pic__slider owl-carousel">
                                    <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                        src="img/product/details/thumb-1.jpg" alt="">
                                    <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                        src="img/product/details/thumb-2.jpg" alt="">
                                    <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                        src="img/product/details/thumb-3.jpg" alt="">
                                    <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                        src="img/product/details/thumb-4.jpg" alt="">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="product__details__text">
                                <h3>{{ $details->title }}</h3>
                                <div class="product__details__rating">
                                    {{-- <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i> --}}
                                {{-- <h5 style="color: crimson;">( {{ $details->quantity }} Available )</h5> --}}
                                </div>
                                @if ($details->discount_price !=null )
                                <div class="product__details__price">${{ $details->discount_price }}.00   <h4 style="text-decoration: line-through;">${{ $details->price }}.00</h4> </div>
                                
                                @else
                                    <div class="product__details__price">${{ $details->price }}.00</div>
                                @endif
                                
                                <p>{{ $details->description }}.</p>







                                <form action="{{ url('add_cart',$details->id) }}" method="POST">
                                    @csrf
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        {{-- <div class="pro-qty"> --}}
                                            <input name="quantity" style="width: 200px" type="number" min="1" value="1">
                                        <input type="submit" style="background-color: crimson;" value="ADD TO CART">

                                        {{-- <input type="submit" style="background-color: crimson;" value="ADD TO CARD"> --}}

                                        {{-- </div> --}}
                                    </div>
                                </div>
                                {{-- <input type="submit" class="primary-btn" style="background-color: crimson;" value="ADD TO CARD"> --}}

                                {{-- <a href="" class="primary-btn" style="background-color: crimson;">ADD TO CARD</a> --}}
                                {{-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> --}}
                            </form>







                                <ul>
                                    <li><b>Availability</b> <span>{{ $details->quantity }}</span></li>
                                    <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                                    <li><b>Weight</b> <span>0.5 kg</span></li>
                                    <li><b>Share on</b>
                                        <div class="share">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product__details__tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                            aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                            aria-selected="false">Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                            aria-selected="false">Reviews <span>(1)</span></a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="product__details__tab__desc">
                                            <h6>Products Infomation</h6>
                                            <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                                Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                                suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                                vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                                Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                                accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                                pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                                elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                                et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                                vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                                ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                                elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                                porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                                nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                                Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                                porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                                sed sit amet dui. Proin eget tortor risus.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <div class="product__details__tab__desc">
                                            <h6>Products Infomation</h6>
                                            <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                                Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                                Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                                sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                                eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                                Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                                sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                                diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                                ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                                Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                                Proin eget tortor risus.</p>
                                            <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                                ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                                elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                                porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                                nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                                        <div class="product__details__tab__desc">
                                            <h6>Products Infomation</h6>
                                            <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                                Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                                Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                                sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                                eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                                Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                                sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                                diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                                ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                                Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                                Proin eget tortor risus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <!-- Product Details Section End -->

            <!-- end header section -->
        </div>


    



    
        <!-- footer start -->

        @include('home.footer')

        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="">Mohamed ALgendy</a><br>
        
        
        </p>
        </div>
        <!-- jQery -->
     

<!---- details form ---->

<!-- Js Plugins -->
<script src="details/js/jquery-3.3.1.min.js"></script>
<script src="details/js/bootstrap.min.js"></script>
<script src="details/js/jquery.nice-select.min.js"></script>
<script src="details/js/jquery-ui.min.js"></script>
<script src="details/js/jquery.slicknav.js"></script>
<script src="details/js/mixitup.min.js"></script>
<script src="details/js/owl.carousel.min.js"></script>
<script src="details/js/main.js"></script>


    </body>
</html>