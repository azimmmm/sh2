<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link href="/image/favicon.png" rel="icon"/>
    <title>مارکت شاپ - قالب HTML فروشگاهی</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap/css/bootstrap-rtl.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/stylesheet.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.transitions.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('js/swipebox/src/css/swipebox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/stylesheet-rtl.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive-rtl.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/stylesheet-skin2.css')}}"/>

    <!-- CSS Part End-->
    @yield('head')
</head>
<body>
<div class="wrapper-wide">
    <div id="header">
        <!-- Top Bar Start-->
        <nav id="top" class="htop">
            <div class="container">
                <div class="row"><span class="drop-icon visible-sm visible-xs"><i
                                class="fa fa-align-justify"></i></span>
                    <div class="pull-left flip left-top">
                        <div class="links">
                            <ul>
                                <li class="mobile"><i class="fa fa-phone"></i>+21 9898777656</li>
                                <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i>info@marketshop.com</a>
                                </li>
                                <li class="wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی<b></b></a>
                                    <div class="dropdown-menu custom_block">
                                        <ul>
                                            <li>
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td><img alt="" src="/image/banner/cms-block.jpg"></td>
                                                        <td><img alt="" src="/image/banner/responsive.jpg"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4>بلاک های محتوا</h4></td>
                                                        <td><h4>قالب واکنش گرا</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html
                                                            نوشتاری یا تصویری را در آن قرار دهید.
                                                        </td>
                                                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html
                                                            نوشتاری یا تصویری را در آن قرار دهید.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><a class="btn btn-default btn-sm" href="#">ادامه
                                                                    مطلب</a></strong></td>
                                                        <td><strong><a class="btn btn-default btn-sm" href="#">ادامه
                                                                    مطلب</a></strong></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="language" class="btn-group">
                            <button class="btn-link dropdown-toggle" data-toggle="dropdown"><span> <img
                                            src="/image/flags/gb.png" alt="انگلیسی" title="انگلیسی">انگلیسی <i
                                            class="fa fa-caret-down"></i></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="btn btn-link btn-block language-select" type="button" name="GB"><img
                                                src="/image/flags/gb.png" alt="انگلیسی" title="انگلیسی"/> انگلیسی
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-link btn-block language-select" type="button" name="GB"><img
                                                src="/image/flags/ar.png" alt="عربی" title="عربی"/> عربی
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div id="currency" class="btn-group">
                            <button class="btn-link dropdown-toggle" data-toggle="dropdown"><span> تومان <i
                                            class="fa fa-caret-down"></i></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€
                                        Euro
                                    </button>
                                </li>
                                <li>
                                    <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£
                                        Pound Sterling
                                    </button>
                                </li>
                                <li>
                                    <button class="currency-select btn btn-link btn-block" type="button" name="USD">$
                                        USD
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="top-links" class="nav pull-right flip">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <ul>
                                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a></li>
                                <li><a href="{{route('user.profile')}}">حساب کاربری</a></li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <ul>
                                <li><a href="{{route('login')}}">ورود</a></li>
                                <li><a href="{{route('register2')}}">ثبت نام</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <!-- Logo Start -->
                    <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                        <div id="logo"><a href="{{url('/')}}"><img class="img-responsive" src="/image/logo.png"
                                                                 title="MarketShop" alt="MarketShop"/></a></div>
                    </div>
                    <!-- Logo End -->
                    <!-- Mini Cart Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div id="cart">
                            <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..."
                                    class="heading dropdown-toggle">
                                <span class="cart-icon pull-left flip"></span>
                           <span id="cart-total">{{\Illuminate\Support\Facades\Session::has('cart')?\Illuminate\Support\Facades\Session::get('cart')->totalNumber.'آیتم':'0'.'آیتم'}}{{\Illuminate\Support\Facades\Session::has('cart')?\Illuminate\Support\Facades\Session::get('cart')->totalPrice.'تومان':''}}</span>
                            </button>
                            @if(Session::has('cart'))
                                {{--{{dd(Session::get('cart'))}}--}}
                                <ul class="dropdown-menu">
                                    <li>
                                        <table class="table">

                                            @foreach(Session::get('cart')->items as $productCart)
                                                <tbody>
                                                <tr>
                                                    <td class="text-center"><a href="#"><img class="img-thumbnail"
                                                                                            title="{{$productCart['item']->title}}"
                                                                                            alt="{{$productCart['item']->title}}"
                                                                                            src="{{$productCart['item']->photo->path}}"
                                                                                            style="width:18%"></a></td>
                                                    <td class="text-left"><a
                                                                href="">{{$productCart['item']->title}}</a></td>
                                                    <td class="text-right">{{$productCart['number']}}</td>
                                                    <td class="text-right">{{$productCart['price']}} تومان</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-danger btn-xs remove" type="button" title="حذف"
                                                                onclick="event.preventDefault();
                                                     document.getElementById('remove-item_{{$productCart['item']->id}}').submit();"><i class="fa fa-times"></i>
                                                        </button>

                                                        <form id="remove-item_{{$productCart['item']->id}}" action="{{ route('cart.remove',['id'=>$productCart['item']->id]) }}" method="post" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </li>
                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td class="text-right"><strong>مجموع خرید بدون احتساب تخفیف</strong></td>
                                                    <td class="text-right">{{\Illuminate\Support\Facades\Session::get('cart')->totalPurePrice}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>تخفیف</strong></td>
                                                    <td class="text-right">{{\Illuminate\Support\Facades\Session::get('cart')->totalDisPrice}}</td>
                                                </tr>

                                                <tr>
                                                    <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                    <td class="text-right">{{\Illuminate\Support\Facades\Session::get('cart')->totalPrice}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="checkout"><a href="{{route('cart.get')}}" class="btn btn-primary"><i
                                                            class="fa fa-shopping-cart"></i>    مشاهده سبد و تسویه حساب</a>&nbsp;&nbsp;&nbsp;</p>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <!-- Mini Cart End-->
                    <!-- جستجو Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                        <div id="search" class="input-group">
                            <form method="get" action="{{route('product.search')}}">
                                @csrf
                                <input id="filter_name" type="text" name="search" value="" placeholder="جستجو"
                                       class="form-control input-lg"/>
                                <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- جستجو End-->
                </div>
            </div>
        </header>
        <!-- Header End-->
        <!-- Main آقایانu Start-->

        <nav id="menu" class="navbar">
            <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>

            <div class="container">
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="home_link" title="خانه" href="{{url('/')}}">خانه</a></li>

                    @foreach ($categories as $category)
{{--                            {{dd(count($category->childRecursive))}}--}}
                            <li class="dropdown"><a href="{{route('category.index',$category->id)}}">{{$category->name}}</a>

                                @if(count($category->childRecursive)>0)
                                    @include('viewfrontend.partials.category_list',['categories'=>$category->childRecursive])

                                @endif

                                </li>
                        @endforeach

                        <li class="menu_brands dropdown"><a href="#">برند ها</a>
                            <div class="dropdown-menu">
                                @foreach($brands as $brand)
                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{$brand->photo->path}}" title="{{$brand->name}}" alt="{{$brand->name}}" width="50px" height="50px"/></a><a href="#">{{$brand->title}}</a>
                                </div>
                                @endforeach
                            </div>

                        </li>
                        <li class="dropdown information-link"><a>برگه ها</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="{{route('login')}}">ورود</a></li>
                                    <li><a href="{{route('register2')}}">ثبت نام</a></li>
                                    <li><a href="category.html">دسته بندی (شبکه/لیست)</a></li>
                                    <li><a href="product.html">محصولات</a></li>
                                    <li><a href="cart.html">سبد خرید</a></li>
                                    <li><a href="checkout.html">تسویه حساب</a></li>
                                    <li><a href="compare.html">مقایسه</a></li>
                                    <li><a href="wishlist.html">لیست آرزو</a></li>
                                    <li><a href="search.html">جستجو</a></li>
                                </ul>
                                <ul>
                                    <li><a href="about-us.html">درباره ما</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="elements.html">عناصر</a></li>
                                    <li><a href="faq.html">سوالات متداول</a></li>
                                    <li><a href="sitemap.html">نقشه سایت</a></li>
                                    <li><a href="contact-us.html">تماس با ما</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main آقایانu End-->
    </div>
    <!-- Breadcrumb Start-->

@yield('maincontent')
<!-- Feature Box Start-->

    <!-- Feature Box End-->
    <!--Footer Start-->
    <footer id="footer">
        <div class="fpart-first">
            <div class="container">
                <div class="row">
                    <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <h5>درباره مارکت شاپ</h5>
                        <p>قالب HTML فروشگاهی مارکت شاپ. این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html
                            نوشتاری یا تصویری را در آن قرار دهید.</p>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>اطلاعات</h5>
                        <ul>
                            <li><a href="about-us.html">درباره ما</a></li>
                            <li><a href="about-us.html">اطلاعات 0 تومان</a></li>
                            <li><a href="about-us.html">حریم خصوصی</a></li>
                            <li><a href="about-us.html">شرایط و قوانین</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>خدمات مشتریان</h5>
                        <ul>
                            <li><a href="contact-us.html">تماس با ما</a></li>
                            <li><a href="#">بازگشت</a></li>
                            <li><a href="sitemap.html">نقشه سایت</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>امکانات جانبی</h5>
                        <ul>
                            <li><a href="#">برند ها</a></li>
                            <li><a href="#">کارت هدیه</a></li>
                            <li><a href="#">بازاریابی</a></li>
                            <li><a href="#">ویژه ها</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>حساب من</h5>
                        <ul>
                            <li><a href="#">حساب کاربری</a></li>
                            <li><a href="#">تاریخچه سفارشات</a></li>
                            <li><a href="#">لیست علاقه مندی</a></li>
                            <li><a href="#">خبرنامه</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="fpart-second">
            <div class="container">
                <div id="powered" class="clearfix">
                    <div class="powered_text pull-left flip">
                        <p>کپی رایت © 2016 فروشگاه شما | پارسی سازی و ویرایش توسط <a href="https://www.mrcode.ir"
                                                                                     target="_blank">مسترکد</a></p>
                    </div>
                    <div class="social pull-right flip"><a href="#" target="_blank"> <img data-toggle="tooltip"
                                                                                          src="/image/socialicons/facebook.png"
                                                                                          alt="Facebook"
                                                                                          title="Facebook"></a> <a
                                href="#" target="_blank"> <img data-toggle="tooltip" src="/image/socialicons/twitter.png"
                                                               alt="Twitter" title="Twitter"> </a> <a href="#"
                                                                                                      target="_blank">
                            <img data-toggle="tooltip" src="/image/socialicons/google_plus.png" alt="Google+"
                                 title="Google+"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip"
                                                                                         src="/image/socialicons/pinterest.png"
                                                                                         alt="Pinterest"
                                                                                         title="Pinterest"> </a> <a
                                href="#" target="_blank"> <img data-toggle="tooltip" src="/image/socialicons/rss.png"
                                                               alt="RSS" title="RSS"> </a></div>
                </div>
                <div class="bottom-row">
                    <div class="custom-text text-center">
                        <p>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار
                            دهید.<br> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                            گرافیک است.</p>
                    </div>
                    <div class="payments_types"><a href="#" target="_blank"> <img data-toggle="tooltip"
                                                                                  src="/image/payment/payment_paypal.png"
                                                                                  alt="paypal" title="PayPal"></a> <a
                                href="#" target="_blank"> <img data-toggle="tooltip"
                                                               src="/image/payment/payment_american.png"
                                                               alt="american-express" title="American Express"></a> <a
                                href="#" target="_blank"> <img data-toggle="tooltip"
                                                               src="/image/payment/payment_2checkout.png" alt="2checkout"
                                                               title="2checkout"></a> <a href="#" target="_blank"> <img
                                    data-toggle="tooltip" src="/image/payment/payment_maestro.png" alt="maestro"
                                    title="Maestro"></a> <a href="#" target="_blank"> <img data-toggle="tooltip"
                                                                                           src="/image/payment/payment_discover.png"
                                                                                           alt="discover"
                                                                                           title="Discover"></a> <a
                                href="#" target="_blank"> <img data-toggle="tooltip"
                                                               src="/image/payment/payment_mastercard.png"
                                                               alt="mastercard" title="MasterCard"></a></div>
                </div>
            </div>
        </div>
        <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)"
                              class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
    </footer>
    <!--Footer End-->

</div>
<!-- JS Part Start-->

<script type="text/javascript" src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.easing-1.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dcjqaccordion.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
@yield('scripts')
<!-- JS Part End-->

</body>
</html>