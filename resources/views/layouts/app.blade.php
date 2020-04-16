
<!----Ekhane FrontEnd tar ekdom "Top Header" then "yield(content)" && Footer tar Code ache --->

@php
    $setting=DB::table('sitesetting')->first();
@endphp


<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>OneTech</title>
<meta charset="utf-8">

<!----------this for ajax ----------->
<meta name="csrf" value="{{ csrf_token() }}">       <!----------this for ajax ----------->

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/css/toastr.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css')}}">
{{-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
{{-- <link rel="stylesheet" href="sweetalert2.min.css">          <!--new another--> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script> --}}

    <!---for Product_details page---->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/product_responsive.css') }}">
    <!---for Stripe---->
<script src="https://js.stripe.com/v3/"></script>

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/responsive.css')}}">

</head>

<body>

    <div class="super_container">

        <!-- Header -->
        <header class="header">

            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">

                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('public/frontend/images/phone.png') }}" alt=""></div>{{ $setting->phone_one }}</div>
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('public/frontend/images/mail.png') }}" alt=""></div><a href="mailto:{{ $setting->email }}"> {{ $setting->email }} </a></div>

                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown ">   <!-------Niche "Modal" er code ache------->
                                        <li>
                                           <a href="#" data-toggle="modal" data-target="#exampleModal">My Order Traking</a>
                                        </li>
                                    </ul>
                                </div>&nbsp;&nbsp;&nbsp;

                                <div class="top_bar_menu">
<!------Languaga(bangla/english)------->
                                    <ul class="standard_dropdown">
                                    @php
                                        $language=session()->get('lang');
                                    @endphp
                                    <li>
                                        @if(session()->get('lang') == 'bangla')
                                        <a href="{{ route('language.english') }}">English<i class="fas fa-chevron-down"></i></a>
                                        @else
                                        <a href="{{ route('language.bangla') }}">Bangla<i class="fas fa-chevron-down"></i></a>
                                        @endif
                                    </li>
                                    </ul>
                                </div>

                            <div class="top_bar_user">
                                @guest
                                    <div><a href="{{ route('login') }}">
                                        @if(session()->get('lang') == 'bangla')
                                        রেজিস্টার / লগইন
                                        @else
                                        Register/Login
                                        @endif
                                    </a></div>
                                @else
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li> <a href="{{ route('home') }}"><div class="user_icon"><img src="{{ asset('public/frontend/images/user.svg') }}" alt=""></div>
                                            Profile<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('home') }}"><div class="user_icon"><img src="{{ asset('public/frontend/images/user.svg') }}" alt=""></div>
                                                    Profile<i class="fas fa-chevron-down"></i></a>
                                                </li>
                                                <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                                                <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                                <li><a href="#">Extra</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                    @endguest

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ url('/') }}">
                                    @if(session()->get('lang') == 'bangla')
                                        ওয়ানটেক
                                    @else
                                        {{ $setting->company_name }}
                                    @endif
                            </a></div>
                            </div>
                        </div>

                        @php
                            $category=DB::table('categories')->get();
                        @endphp

    <!-------------- Search ----------------->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form action="{{ route('product.search') }}" class="header_search_form clearfix" method="post">
                                @csrf
                                <input type="search" required="required" class="header_search_input" placeholder="Search for products..." name="search">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">All Categories</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            <li><a class="clc" href="#">All Categories</a></li>
                                            @foreach($category as $row)
                                            <li><a class="clc" href="#">{{ $row->category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('public/frontend/images/search.png') }}" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        @guest
                        @else
                        @php
                        $wishlist=DB::table('wishlists')->where('user_id',Auth::id())->get();
                        @endphp
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon"><img src="{{ asset('public/frontend/images/heart.png') }}" alt=""></div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="{{ route('user.wishlist') }}">Wishlist</a></div>
                                <div class="wishlist_count">{{ count($wishlist) }}</div>
                            </div>
                        </div>
                        @endguest


                <!---- Cart ---->
                @php
                $setting=DB::table('settings')->first();
                $charge=$setting->shipping_charge;
                @endphp

                <div class="cart">
                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                        <div class="cart_icon">
                            <img src="{{ asset('public/frontend/images/cart.png') }}" alt="">
                            <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                        </div>
                        <div class="cart_content">
                            <div class="cart_text"><a href="{{ route('show.cart') }}">Cart</a></div>
                            @if(Session::has('coupon'))
<!--ekhane 'a non well formed numeric value entered' problem ta asteche,tai comment kore dechi-->
                            <div class="cart_price">$ {{ Session::get('coupon')['balance'] + $charge }} </div>
                            {{-- <div class="cart_price">$ {{ Session::get('coupon')['balance'] }} </div> --}}
                            @else
                            <div class="cart_price">$ {{ Cart::Subtotal() }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</header>


            <!-- Main Navigation -->


    @yield('content')


            <!-------- Start Footer ----------->
@php
    $setting=DB::table('sitesetting')->first();
@endphp

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="{{ url('/') }}">{{ $setting->company_name }}</a></div>
                        </div>
                        <div class="footer_title">Got Question? Call Us 24/7</div>
                        <div class="footer_phone">{{ $setting->phone_two}}</div>
                        <div class="footer_contact_text">
                            <p>{{ $setting->company_address }}</p>
                            <p>Grester London NW18JR, UK</p>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Find it Fast</div>
                        <ul class="footer_list">
                            <li><a href="#">Computers & Laptops</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Smartphones & Tablets</a></li>
                            <li><a href="#">TV & Audio</a></li>
                        </ul>
                        <div class="footer_subtitle">Gadgets</div>
                        <ul class="footer_list">
                            <li><a href="#">Car Electronics</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <ul class="footer_list footer_list_2">
                            <li><a href="#">Video Games & Consoles</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Computers & Laptops</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Customer Care</div>
                        <ul class="footer_list">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Order Tracking</a></li>
                            <li><a href="#">Wish List</a></li>
                            <li><a href="#">Customer Services</a></li>
                            <li><a href="#">Returns / Exchange</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Product Support</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{ asset('public/frontend/images/logos_1.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/frontend/images/logos_2.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/frontend/images/logos_3.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/frontend/images/logos_4.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--------- Order Tracking Modal -------------->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('order.tracking') }}">
                    @csrf
                    <div class="form-row">
                        <label>Status Code</label>
                        <input type="text" name="code" required="" class="form-control" placeholder="Enter order status code">
                    </div><br>
                    <button class="btn btn-danger" type="submit">Track Now</button>
                </form>
            </div>
        </div>
        </div>
    </div>




<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('public/frontend/plugins/easing/easing.js')}}"></script>

{{-- <script src="{{ asset('public/frontend/js/product_custom.js') }}"></script> --}}
{{-- <script src="{{asset('public/backend/js/sweetalert2.min.js')}}"></script> --}}

<!-----------//for ajax //-------->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>      <!--------for using in ajax ------> --}}
<script src="{{asset('public/frontend/js/sweetalert2@8.js')}}"></script>
{{-- <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script> --}}
<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

<script src="{{asset('public/backend/js/toastr.min.js')}}"></script>
<script src="{{asset('public/frontend/js/custom.js')}}"></script>


{{---- sweet alert -----}}
<script>
    $(document).on("click", "#return", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to Return?",
             text: "Once Return,You will get return your money!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Cancel");
             }
           });
       });
</script>

{{--------- Toastr ---------------}}
<script>
    @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}")
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}")
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}")
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}")
            break;
    }
    @endif
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
