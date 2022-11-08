<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>
    <!----form--->
    <div id="form-links">
        @if (Session::has('loginId'))
            <a href="{{ route('dashboard.page') }}">dashboard</a>|
            <a href="{{ route('logout.user') }}">logout</a>|
            <span id="mycart"><i class="fas fa-cart-shopping"></i><a
                    href="{{ route('shoppingcart') }}">mycart({{ count($cart) }})</a></span>
        @else
            <a href="{{ route('loginPage') }}">login</a> |
            <a href="{{ route('registerPage') }}">register</a>
        @endif
    </div>
    <!----form--->

    <!--search-->
    <div id="searchbar">
        <form action="{{ route('search') }}" method="get" autocomplete="off">
            <div class="input-group rounded">
                <div class="searchresults">

                </div>
                <input type="search" name='search' class="form-control rounded search" placeholder="search something"
                    aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <!--search-->

    <!--navbar-->
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">fashion</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">women</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">footwear</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">accessories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">blog</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--navbar-->
    <!--section1-->
    <section class="one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-xs-3">
                    <div class="carouselparent" >
                        <div class="slider">
                            <div class="image">
                                <img src="{{ asset('frontend/gallery/1.jpg') }}" alt="">
                                <img src="{{ asset('frontend/gallery/11.jpg') }}" alt="">
                                <img src="{{ asset('frontend/gallery/13.jpg') }}" alt="">
                                <img src="{{ asset('frontend/gallery/36.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="controls">
                            <button id="prev"><i class="fas fa-angle-left"></i></button>
                            <button id="next"><i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section1-->
    <!--section2-->
    <section class="two">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-4">
                    <div class="para1">
                        <div class="para1image"><img src="{{ asset('frontend/gallery/5.jpg') }}" alt="">
                        </div>
                        <p class="header">hot collection</p>
                        <h2>New trend for women</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam architecto veniam
                            adipisci
                            rem
                            hic eius atque voluptatum minima asperiores voluptatibus.</p>
                        <button>shop now</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="para2image">
                        <img src="{{ asset('frontend/gallery/6.jpg') }}" alt="">
                        <div class="overlay"></div>
                        <button>view collection</button>
                    </div>
                    <div class="row">
                        <div class=" col-lg-10">
                            <div class="para2image1"><img src="{{ asset('frontend/gallery/7.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section2-->
    <!--section3-->
    <section class="three col-lg-12 col-md-12 col-sm-3 col-xs-3">
        <div class="container mt-5">
            <div class="row">
                <div class="sec3header text-center">
                    <h3>featured items</h3>
                </div>
                {{-- <div class="sec3links">
                    <ul>
                        <li><a href="#" class="active">Sunglasses</a></li>
                        <li><a href="#">Tshirts</a></li>
                        <li><a href="#">Bags</a></li>
                        <li><a href="#">All</a></li>
                    </ul>
                </div> --}}
                <div class="sec3links">
                    <ul>
                        <li><a href="#" class="category active" data-id="all">all</a></li>
                        @foreach ($category as $c)
                            <li><a href="#" class="category"
                                    data-id="{{ $c->id }}">{{ $c->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!---------->

                <div class="sec3image " id="sec3image">
                    <div class="row">
                        @foreach ($category as $cat)
                            @foreach ($cat->product as $c)
                                <div class="col-lg-3" data-id="{{ $c->id }}">
                                    <div class="image1">
                                        <img src="{{ asset('frontend/gallery/' . $c->image) }} " alt="">
                                        <div class="title">
                                            <h2>{{ $c->productname }}</h2>
                                        </div>
                                        <div class="price">
                                            @if ($c->pricebefore)
                                                <p class="before"> ${{ $c->pricebefore }}</p>
                                            @endif
                                            <p>${{ $c->price }}</p>
                                        </div>
                                        <div class="overlay"></div>
                                        <div class="show"><a href="{{ route('show.cart', $c->id) }}"
                                                target="blank"><i class="fas fa-eye"></i></a></div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>

                </div>


    </section>
    <!--section3-->
    <!---section4-->
    <section class="four mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sec4image"><img src="{{ asset('frontend/gallery/33.jpg') }}" alt=""></div>
                </div>
                <div class="col-lg-6">
                    <div class="sec4image"><img src="{{ asset('frontend/gallery/34.jpg') }}" alt=""></div>
                </div>
                <div class="sec4title">
                    <h2>trending item</h2>
                </div>
                <div class="sec4img col-lg-12 col-md-12 col-sm-6 col-xs-3">
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/bags1.jpg') }}" alt="">
                        <div class="title">
                            <h2>product13</h2>
                        </div>
                        <div class="price">

                            <p>$150.00</p>
                        </div>


                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/bags2.jpg') }}" alt="">
                        <div class="title">
                            <h2>product14</h2>
                        </div>
                        <div class="price">

                            <p>$150.00</p>
                        </div>


                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/bags3.jpg') }}" alt="">
                        <div class="title">
                            <h2>product15</h2>
                        </div>
                        <div class="price">
                            <p class="before"> $200.00</p>
                            <p>$150.00</p>
                        </div>

                        <p id="discount">20% off</p>
                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/bags4.jpg') }}" alt="">
                        <div class="title">
                            <h2>product16</h2>
                        </div>
                        <div class="price">

                            <p>$150.00</p>
                        </div>

                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/laptops1.jpg') }}" alt="">
                        <div class="title">
                            <h2>product17</h2>
                        </div>
                        <div class="price">
                            <p class="before"> $1250.00</p>
                            <p>$1100.00</p>
                        </div>

                        <p id="discount">20% off</p>
                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/laptops2.jpg') }}" alt="">
                        <div class="title">
                            <h2>product18</h2>
                        </div>
                        <div class="price">
                            <p>$900.00</p>
                        </div>

                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/laptops3.jpg') }}" alt="">
                        <div class="title">
                            <h2>product19</h2>
                        </div>
                        <div class="price">
                            <p>$800.00</p>
                        </div>

                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/laptops4.jpg') }}" alt="">
                        <div class="title">
                            <h2>product20</h2>
                        </div>
                        <div class="price">
                            <p>$700.00</p>
                        </div>

                    </div>
                </div>
                <div id="loadmore"><a href="#">loadmore</a></div>
                <!--------->
                <div id="viewmore" class="sec4img mt-50  col-lg-12 col-md-12 col-sm-6 col-xs-3"
                    style="display: none">
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/slippers1.jpg') }}" alt="">
                        <div class="title">
                            <h2>product21</h2>
                        </div>
                        <div class="price">

                            <p>$150.00</p>
                        </div>

                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/slippers2.jpg') }}" alt="">
                        <div class="title">
                            <h2>product22</h2>
                        </div>
                        <div class="price">

                            <p>$150.00</p>
                        </div>

                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/slippers3.jpg') }}" alt="">
                        <div class="title">
                            <h2>product23</h2>
                        </div>
                        <div class="price">
                            <p class="before"> $500.00</p>
                            <p>$350.00</p>
                        </div>

                        <p id="discount">20% off</p>
                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/slippers4.jpg') }}" alt="">
                        <div class="title">
                            <h2>product24</h2>
                        </div>
                        <div class="price">

                            <p>$150.00</p>
                        </div>

                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/watch1.jpg') }}" alt="">
                        <div class="title">
                            <h2>product25</h2>
                        </div>
                        <div class="price">
                            <p class="before"> $600.00</p>
                            <p>$500.00</p>
                        </div>

                        <p id="discount">20% off</p>
                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/watch2.jpg') }}" alt="">
                        <div class="title">
                            <h2>product26</h2>
                        </div>
                        <div class="price">

                            <p>$400.00</p>
                        </div>

                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/watch3.jpg') }}" alt="">
                        <div class="title">
                            <h2>product27</h2>
                        </div>
                        <div class="price">
                            <p>$350.00</p>
                        </div>

                    </div>
                    <div class="image">
                        <img src="{{ asset('frontend/gallery/watch4.jpg') }}" alt="">
                        <div class="title">
                            <h2>product28</h2>
                        </div>
                        <div class="price">
                            <p>$600.00</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---section4-->
    <!---section5----->
    <section class="five mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-3 col-xs-3">
                    <div class="fiveimg">
                        <img src="{{ asset('frontend/gallery/tie shoelaces.jpg') }}" alt="">
                        <div class="quotes"><i class="fas fa-quote-left"></i></div>
                        <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta est,
                            eius quo recusandae
                            consequuntur veniam temporibus dolorum tenetur ducimus.</p>
                        <div class="image"><img src="{{ asset('frontend/gallery/man wearing sunglasses.jpg') }}"
                                alt=""></div>
                        <p class="name">md shahim alam</p>
                        <p class="job">ceo of ttcm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---section5----->
    <!----section6-->
    <section class="six my-5">
        <div class="container">
            <div class="row">
                <div class="sec6header mb-2">
                    <h2>latest blog</h2>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card" style="width: 22rem;">
                        <img src="{{ asset('frontend/gallery/fashionmodels1.jpg') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo
                                exercitationem dolor necessitatibus eos assumenda hic nisi ad quo vel reiciendis..</p>
                            <a href="#" class="btn btn-primary">readmore</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card" style="width: 22rem;">
                        <img src="{{ asset('frontend/gallery/fashionmodel2.jpg') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo
                                exercitationem dolor necessitatibus eos assumenda hic nisi ad quo vel reiciendis..</p>
                            <a href="#" class="btn btn-primary">readmore</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card" style="width: 22rem;">
                        <img src="{{ asset('frontend/gallery/businessman.jpg') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo
                                exercitationem dolor necessitatibus eos assumenda hic nisi ad quo vel reiciendis..</p>
                            <a href="#" class="btn btn-primary">readmore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----section6-->
    <!---section7--->
    <section class="seven">
        <div class="container">
            <div class="row">
                <div class="sec7header">
                    <h2>shop by brand</h2>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="sec7image"><img src="{{ asset('frontend/gallery/nike.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="sec7image"><img src="{{ asset('frontend/gallery/adidas.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="sec7image"><img src="{{ asset('frontend/gallery/puma.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="sec7image"><img src="{{ asset('frontend/gallery/skechers.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---section7--->
    <!----footer--->
    <footer style="margin-top: 50px">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="footer-title">
                        <h5>shops</h5>
                    </div>
                    <div class="footer-li">
                        <li> <a href="#">new in</a> </li>
                        <li> <a href="#">women</a> </li>
                        <li> <a href="#">men</a> </li>
                        <li> <a href="#">schuhe shoes</a> </li>
                        <li> <a href="#">bags & accessories</a> </li>
                        <li> <a href="#">top brands</a> </li>
                        <li> <a href="#">sale & special offers</a> </li>
                        <li> <a href="#">lookbook</a> </li>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="footer-title">
                        <h5>information</h5>
                    </div>
                    <div class="footer-li">
                        <li> <a href="#">about us</a> </li>
                        <li> <a href="#">customer service</a> </li>
                        <li> <a href="#">new collection</a> </li>
                        <li> <a href="#">best sellers</a> </li>
                        <li> <a href="#">manufacturers</a> </li>
                        <li> <a href="#">privacy policy</a> </li>
                        <li> <a href="#">terms & conditions</a> </li>
                        <li> <a href="#"> blog</a> </li>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="footer-title">
                        <h5>customer service</h5>
                    </div>
                    <div class="footer-li">
                        <li> <a href="#">search terms</a> </li>
                        <li> <a href="#">advanced search</a> </li>
                        <li> <a href="#">orders & returns</a> </li>
                        <li> <a href="#">contact us</a> </li>
                        <li> <a href="#">rss</a> </li>
                        <li> <a href="#">help & faqs</a> </li>
                        <li> <a href="#">consultant</a> </li>
                        <li> <a href="#">store locations</a> </li>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="footer-title">
                        <h5>newsletter</h5>
                    </div>
                    <div class="footer-subtitle">
                        <h5>signup for newsletter</h5>
                        <input class="input" type="text" placeholder="type your email">
                    </div>
                    <div class="footer-subscribe">
                        <a href="#">subscribe</a>
                    </div>
                    <div class="socialmedia-icons">
                        <div id="facebook"><i class="fab fa-facebook-f"></i></div>
                        <div id="twitter"><i class="fab fa-twitter"></i></div>
                        <div id="be"><i class="fab fa-behance-square"></i></div>
                        <div id="t"><i class="fab fa-tumblr"></i></div>
                        <div id="v"><i class="fab fa-vimeo-v"></i></div>
                        <div id="youtube"><i class="fab fa-youtube"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!----footer--->
    <div class="end col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="row">
                <div class="copyright">
                    <p class="copyr"><span><i class="fas fa-copyright"></i></span>2014 Ella fashion store shopify.
                        All rights reserved. ecommerce software
                        by shopify.</p>
                    <div class="cards-icons">
                        <i class="fa-brands fa-cc-visa"></i>
                        <i class="fa-brands fa-cc-mastercard"></i>
                        <i class="fa-brands fa-cc-paypal"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
</body>

</html>
