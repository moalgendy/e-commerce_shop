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

{{-- sweet alert cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>

        @include('sweetalert::alert')


        <div class="hero_area">
            <!-- header section strats -->

            @include('home.header')



    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">

            
            @if (session()->has('message'))
                    
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>

            @endif



            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- لازم تتحط برا الفور ايتش --}}
                                <?php $totalprice = 0; ?>
                                {{-- ------ --}}

                            @foreach ($carts as $cart)
                                <tr>
                                    
                                        
                                    
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                        <h5>{{ $cart->product_title }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{ $cart->price }}.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input name="quantity"  value="{{ $cart->quantity }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{ $cart->total_price }}.00
                                    </td>

                                    <td class="shoping__cart__item__close">
                                        <a onclick="confirmation(event)" href="{{ url('delete_cart' , $cart->id) }}" >
                                            <span class="icon_close"></span>
                                        </a>
                                        
                                    </td>

                                </tr>



                                {{-- لازم تتحط جوا الفور ايتش --}}
                                <?php $totalprice = $totalprice + $cart->total_price; ?>
                                {{-- ------- --}}


                                @endforeach
                                
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Pay by :</h5>
                            <form action="#">
                                {{-- <input type="text" placeholder="Enter your coupon code"> --}}
                                {{-- <button type="submit" class="site-btn">pay cash upon receipt</button> --}}
                                <a style="background: #6f6f6f; color:#fff;" href="{{ url('cash_order') }}" class="primary-btn cart-btn">Cash on Delivery</a>
                                <a style="background: #6f6f6f; color:#fff;" href="{{ url('stripe',$totalprice) }}" class="primary-btn cart-btn">Pay Using Card</a>

                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>${{ $totalprice }}.00</span></li>
                            <li>Total <span>${{ $totalprice }}.00</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

            <!-- end header section -->
        </div>


    



    
        <!-- footer start -->

        @include('home.footer')

        <!-- footer end -->
        <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="{{ url('/show_cart') }}">Mohamed ALgendy</a><br>
        
        
        </p>
        </div>



    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');  
            console.log(urlToRedirect); 
            swal({
                title: "Are you sure to cancel this product",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {
    
    
                    
                    window.location.href = urlToRedirect;
                    
                }

            //     else{
            //         swal({
            //     title: "Are you sure to cancel this product",
            //     text: "You will not be able to revert this!",
            //     icon: "warning",
            //     buttons: true,
            //     dangerMode: true,
            // })
            //     }
    
    
            });
    
            
        }
    </script>








        <!-- jQery -->
        
        <script src="home/details/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/details/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/details/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/details/js/custom.js"></script>


<!---- details form ---->

<!-- Js Plugins -->
<script src="details/js/jquery-3.3.1.min.js"></script>
<script src="details/js/bootstrap.min.js"></script>
<script src="details/js/jquery.nice-select.min.js"></script>
<script src="details/js/jquery-ui.min.js"></script>
<script src="details/js/jquery.slicknav.js"></script>
<script src="details/js/mixitup.min.js"></script>
<script src="details/js/main.js"></script>


    </body>
</html>