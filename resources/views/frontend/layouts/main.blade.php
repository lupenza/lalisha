<!DOCTYPE html>
@php
    $program_categories =\App\Models\Category::get();
    $carts =Cart::content();
@endphp
<html class="no-js" lang="en">
    
<!-- Mirrored from www.annimexweb.com/items/hema/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Mar 2024 06:16:14 GMT -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="description">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Title Of Site -->
        <title>Lalisha Fitness</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/frontend/images/lalisha_icon_2.jpeg') }}" />
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/vendor/photoswipe.min.css')}}">

        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/style-min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    </head>

    <body class="template-index index-demo1">
        <!--Page Wrapper-->
        <div class="page-wrapper">
            <!--Marquee Text-->
           @include('frontend.layouts.marque')
            <!--End Marquee Text-->

            <!--Top Header-->
            @include('frontend.layouts.top_header')
           
            <!--End Top Header-->

            <!--Header-->
            @include('frontend.layouts.header')
            <!--End Header-->
            <!--Mobile Menu-->
            @include('frontend.layouts.mobile_menu')

            <!--End Mobile Menu-->

            <!-- Body Container -->
            <div id="page-content" class="mb-0">
               @yield('content')
            </div>
            <!-- End Body Container -->

            <!--Footer-->
            @include('frontend.layouts.footer')

            <!--End Footer-->

            <!--Sticky Menubar Mobile-->
            <div class="menubar-mobile d-flex align-items-center justify-content-between d-lg-none">
                <div class="menubar-shop menubar-item">
                    <a href="{{ route('all.programs')}}"><i class="menubar-icon anm anm-th-large-l"></i><span class="menubar-label">Programs</span></a>
                </div>
                @if (Auth::user()?->hasRole('Customer'))
                <div class="menubar-account menubar-item">
                    <a href="{{ route('my.account')}}"><i class="menubar-icon icon anm anm-user-al"></i><span class="menubar-label">Account</span></a>
                </div>  
                @endif
               
                <div class="menubar-search menubar-item">
                    <a href="{{ route('home')}}"><span class="menubar-icon anm anm-home-l"></span><span class="menubar-label">Home</span></a>
                </div>
                {{-- <div class="menubar-wish menubar-item">
                    <a href="wishlist-style1.html">
                        <span class="span-count position-relative text-center"><i class="menubar-icon icon anm anm-heart-l"></i><span class="wishlist-count counter menubar-count">0</span></span>
                        <span class="menubar-label">Wishlist</span>
                    </a>
                </div> --}}
                <div class="menubar-cart menubar-item">
                    <a href="#;" class="btn-minicart" data-bs-toggle="offcanvas" data-bs-target="#minicart-drawer">
                        <span class="span-count position-relative text-center"><i class="menubar-icon icon anm anm-cart-l"></i><span class="cart-count counter menubar-count">{{ $carts->count()}}</span></span>
                        <span class="menubar-label">Cart</span>
                    </a>
                </div>
            </div>
            <!--End Sticky Menubar Mobile-->

            <!--Scoll Top-->
            <div id="site-scroll"><i class="icon anm anm-arw-up"></i></div>
            <!--End Scoll Top-->

            <!--MiniCart Drawer-->
            <div id="minicart-drawer" class="minicart-right-drawer offcanvas offcanvas-end" tabindex="-1">
                <!--MiniCart Empty-->
                <div id="cartEmpty" class="cartEmpty d-flex-justify-center flex-column text-center p-3 text-muted d-none">
                    <div class="minicart-header d-flex-center justify-content-between w-100">
                        <h4 class="fs-6">Your cart ({{ $carts->count()}} Items)</h4>
                        <button class="close-cart border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></button>
                    </div>
                    <div class="cartEmpty-content mt-4">
                        <i class="icon anm anm-cart-l fs-1 text-muted"></i> 
                        <p class="my-3">No Products in the Cart</p>
                        <a href="index.html" class="btn btn-primary cart-btn">Continue shopping</a>
                    </div>
                </div>
                <!--End MiniCart Empty-->

                <!--MiniCart Content-->
                <div id="cart-drawer" class="block block-cart">
                    <div class="minicart-header">
                        <button class="close-cart border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></button>
                        <h4 class="fs-6">Your cart ({{ $carts->count()}} Items)</h4>
                    </div>
                    <div class="minicart-content">
                        <ul class="m-0 clearfix">
                            @foreach ($carts as $cart)
                            <li class="item d-flex justify-content-center align-items-center">
                                <a class="product-image rounded-3" href="product-layout1.html">
                                    <img class="blur-up lazyload" data-src="{{ asset('storage/uploads'.'/'.$cart->options?->image)}}" src="{{ asset('storage/uploads'.'/'.$cart->options?->image)}}" alt="product" title="Product" width="120" height="170" />
                                </a>
                                <div class="product-details">
                                    <a class="product-title" href="product-layout1.html">{{ $cart->name}}</a>
                                    <div class="variant-cart my-2">{{ $cart->options?->category}}</div>
                                    <div class="priceRow">
                                        <div class="product-price">
                                            <span class="price">{{ number_format($cart->price) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="qtyDetail text-center">
                                    <div class="qtyField">
                                        <a class="qtyBtn minus" href="#;"><i class="icon anm anm-minus-r"></i></a>
                                        <input type="text" name="quantity" value="{{ $cart->qty }}" class="qty">
                                        <a class="qtyBtn plus" href="#;"><i class="icon anm anm-plus-r"></i></a>
                                    </div>
                                    {{-- <a href="#" class="edit-i remove"><i class="icon anm anm-pencil-ar" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i></a> --}}
                                    <a href="{{ route('remove.cart',$cart->rowId)}}" class="remove"><i class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"></i></a>
                                </div>
                            </li>   
                            @endforeach
                        </ul>
                    </div>
                    <div class="minicart-bottom">
                        {{-- <div class="shipinfo">
                            <div class="progress mb-2"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div></div>
                            <div class="freeShipMsg"><i class="icon anm anm-truck-l fs-6 me-2 align-middle"></i>Only <span class="money" data-currency-usd="$199.00" data-currency="USD">$199.00</span> away from <b>Free Shipping</b></div>
                            <div class="freeShipMsg d-none"><i class="icon anm anm-truck-l fs-6 me-2 align-middle"></i>Congrats! You are eligible for <b>Free Shipping</b></div>
                        </div> --}}
                        <div class="subtotal clearfix my-3">
                            {{-- <div class="totalInfo clearfix mb-1 d-none"><span>Shipping:</span><span class="item product-price">$10.00</span></div>
                            <div class="totalInfo clearfix mb-1 d-none"><span>Tax:</span><span class="item product-price">$0.00</span></div> --}}
                            <div class="totalInfo clearfix"><span>Total:</span><span class="item product-price">{{ number_format(Cart::subtotal())}}</span></div>

                        </div>
                        {{-- <div class="agree-check customCheckbox">
                            <input id="prTearm" name="tearm" type="checkbox" value="tearm" required />
                            <label for="prTearm"> I agree with the </label><a href="#" class="ms-1 text-link">Terms &amp; conditions</a>
                        </div> --}}
                        <div class="minicart-action d-flex mt-3">
                            <a href="{{ route('cart.checkout')}}" class="proceed-to-checkout btn btn-primary w-100 me-1">Check Out</a>
                            {{-- <a href="cart-style1.html" class="cart-btn btn btn-secondary w-50 ms-1">View Cart</a> --}}
                        </div>
                    </div>
                </div>
                <!--MiniCart Content-->
            </div>
            <!--End MiniCart Drawer-->

            <!-- Product Quickshop Modal-->
            <div class="quickshop-modal modal fade" id="quickshop_modal" tabindex="-1" aria-hidden="true">           
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <form method="post" action="#" id="product-form-quickshop" class="product-form align-items-center">
                                <!-- Product Info -->
                                <div class="row g-0 item mb-3">
                                    <a class="col-4 product-image" href="product-layout1.html"><img class="blur-up lazyload" data-src="assets/frontend/images/products/addtocart-modal.jpg" src="assets/frontend/images/products/addtocart-modal.jpg" alt="Product" title="Product" width="625" height="800" /></a>
                                    <div class="col-8 product-details">
                                        <div class="product-variant ps-3">

                                            <a class="product-title" href="product-layout1.html">Weave Hoodie Sweatshirt</a>
                                            <div class="priceRow mt-2 mb-3">
                                                <div class="product-price m-0"><span class="old-price">$114.00</span><span class="price">$99.00</span></div>
                                            </div>
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" href="#;"><i class="icon anm anm-minus-r"></i></a>
                                                <input type="text" name="quantity" value="1" class="qty">
                                                <a class="qtyBtn plus" href="#;"><i class="icon anm anm-plus-r"></i></a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Info -->
                                <!-- Swatches Color -->
                                <div class="variants-clr swatches-image clearfix mb-3 swatch-0 option1" data-option-index="0">
                                    <label class="label d-flex justify-content-center">Color:<span class="slVariant ms-1 fw-bold">Black</span></label>
                                    <ul class="swatches d-flex-justify-center pt-1 clearfix">
                                        <li class="swatch large radius available active"><img src="assets/frontend/images/products/swatches/blue-red.jpg" alt="image" width="70" height="70" data-bs-toggle="tooltip" data-bs-placement="top" title="Blue" /></li>
                                        <li class="swatch large radius available"><img src="assets/frontend/images/products/swatches/blue-red.jpg" alt="image" width="70" height="70" data-bs-toggle="tooltip" data-bs-placement="top" title="Black" /></li>
                                        <li class="swatch large radius available"><img src="assets/frontend/images/products/swatches/blue-red.jpg" alt="image" width="70" height="70" data-bs-toggle="tooltip" data-bs-placement="top" title="Pink" /></li>
                                        <li class="swatch large radius available green"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="Green"></span></li>
                                        <li class="swatch large radius soldout yellow"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="Yellow"></span></li>
                                    </ul>
                                </div>
                                <!-- End Swatches Color -->
                                <!-- Swatches Size -->
                                <div class="variants-size swatches-size clearfix mb-4 swatch-1 option2" data-option-index="1">
                                    <label class="label d-flex justify-content-center">Size:<span class="slVariant ms-1 fw-bold">S</span></label>
                                    <ul class="size-swatches d-flex-justify-center pt-1 clearfix">
                                        <li class="swatch large radius soldout"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="XS">XS</span></li>
                                        <li class="swatch large radius available active"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="S">S</span></li>
                                        <li class="swatch large radius available"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="M">M</span></li>
                                        <li class="swatch large radius available"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="L">L</span></li>
                                        <li class="swatch large radius available"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="XL">XL</span></li>
                                    </ul>
                                </div>
                                <!-- End Swatches Size -->
                                <!-- Product Action -->
                                <div class="product-form-submit d-flex-justify-center">
                                    <button type="submit" name="add" class="btn product-cart-submit me-2"><span>Add to cart</span></button>
                                    <button type="submit" name="sold" class="btn btn-secondary product-sold-out d-none" disabled="disabled">Sold out</button>
                                    <button type="submit" name="buy" class="btn btn-secondary proceed-to-checkout">Buy it now</button>
                                </div>
                                <!-- End Product Action -->
                                <div class="text-center mt-3"><a class="text-link" href="product-layout1.html">View More Details</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Quickshop Modal -->

            <!-- Product Addtocart Modal-->
            <div class="addtocart-modal modal fade" id="addtocart_modal" tabindex="-1" aria-hidden="true">           
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <form method="post" action="#" id="product-form-addtocart" class="product-form align-items-center">
                                <h3 class="title mb-3 text-success text-center">Added to cart Successfully!</h3>
                                <div class="row d-flex-center text-center">
                                    <div class="col-md-6">
                                        <!-- Product Image -->
                                        <a class="product-image" href="product-layout1.html"><img class="blur-up lazyload" data-src="assets/frontend/images/products/addtocart-modal.jpg" src="assets/frontend/images/products/addtocart-modal.jpg" alt="Product" title="Product" width="625" height="800" /></a>
                                        <!-- End Product Image -->
                                    </div>
                                    <div class="col-md-6 mt-3 mt-md-0">
                                        <!-- Product Info -->
                                        <div class="product-details">

                                            <a class="product-title" href="product-layout1.html">Cuff Beanie Cap</a>
                                            <p class="product-clr my-2 text-muted">Black / XL</p>
                                        </div>
                                        <div class="addcart-total rounded-5">
                                            <p class="product-items mb-2">There are <strong>1</strong> items in your cart</p>
                                            <p class="d-flex-justify-center">Total: <span class="price">$198.00</span></p>
                                        </div>
                                        <!-- End Product Info -->
                                        <!-- Product Action -->
                                        <div class="product-form-submit d-flex-justify-center">
                                            <a href="#" class="btn btn-outline-primary product-continue w-100">Continue Shopping</a>
                                            <a href="cart-style1.html" class="btn btn-secondary product-viewcart w-100 my-2 my-md-3">View Cart</a>
                                            <a href="checkout-style1.html" class="btn btn-primary product-checkout w-100">Proceed to checkout</a>
                                        </div>
                                        <!-- End Product Action -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Addtocart Modal -->

            <!-- Product Quickview Modal-->
            <div class="quickview-modal modal fade" id="quickview_modal" tabindex="-1" aria-hidden="true">           
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3 mb-md-0">
                                    <!-- Model Thumbnail -->
                                    <div id="quickView" class="carousel slide">
                                        <!-- Image Slide carousel items -->
                                        <div class="carousel-inner">
                                            <div class="item carousel-item active" data-bs-slide-number="0">
                                                <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2.jpg" src="assets/frontend/images/products/product2.jpg" alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="item carousel-item" data-bs-slide-number="1">
                                                <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-1.jpg" src="assets/frontend/images/products/product2-1.jpg" alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="item carousel-item" data-bs-slide-number="2">
                                                <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-2.jpg" src="assets/frontend/images/products/product2-2.jpg" alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="item carousel-item" data-bs-slide-number="3">
                                                <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-3.jpg" src="assets/frontend/images/products/product2-3.jpg" alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="item carousel-item" data-bs-slide-number="4">
                                                <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-4.jpg" src="assets/frontend/images/products/product2-4.jpg" alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="item carousel-item" data-bs-slide-number="5">
                                                <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-5.jpg" src="assets/frontend/images/products/product2-5.jpg" alt="product" title="Product" width="625" height="808" />
                                            </div>
                                        </div>
                                        <!-- End Image Slide carousel items -->
                                        <!-- Thumbnail image -->
                                        <div class="model-thumbnail-img">
                                            <!-- Thumbnail slide -->
                                            <div class="carousel-indicators list-inline">
                                                <div class="list-inline-item active" id="carousel-selector-0" data-bs-slide-to="0" data-bs-target="#quickView">
                                                    <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2.jpg" src="assets/frontend/images/products/product2.jpg" alt="product" title="Product" width="625" height="808" />
                                                </div>
                                                <div class="list-inline-item" id="carousel-selector-1" data-bs-slide-to="1" data-bs-target="#quickView">
                                                    <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-1.jpg" src="assets/frontend/images/products/product2-1.jpg" alt="product" title="Product" width="625" height="808" />
                                                </div>
                                                <div class="list-inline-item" id="carousel-selector-2" data-bs-slide-to="2" data-bs-target="#quickView">
                                                    <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-2.jpg" src="assets/frontend/images/products/product2-2.jpg" alt="product" title="Product" width="625" height="808" />
                                                </div>
                                                <div class="list-inline-item" id="carousel-selector-3" data-bs-slide-to="3" data-bs-target="#quickView">
                                                    <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-3.jpg" src="assets/frontend/images/products/product2-3.jpg" alt="product" title="Product" width="625" height="808" />
                                                </div>
                                                <div class="list-inline-item" id="carousel-selector-4" data-bs-slide-to="4" data-bs-target="#quickView">
                                                    <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-4.jpg" src="assets/frontend/images/products/product2-4.jpg" alt="product" title="Product" width="625" height="808" />
                                                </div>
                                                <div class="list-inline-item" id="carousel-selector-5" data-bs-slide-to="5" data-bs-target="#quickView">
                                                    <img class="blur-up lazyload" data-src="assets/frontend/images/products/product2-5.jpg" src="assets/frontend/images/products/product2-5.jpg" alt="product" title="Product" width="625" height="808" />
                                                </div>
                                            </div>
                                            <!-- End Thumbnail slide -->
                                            <!-- Carousel arrow button -->
                                            <a class="carousel-control-prev carousel-arrow rounded-1" href="#quickView" data-bs-target="#quickView" data-bs-slide="prev"><i class="icon anm anm-angle-left-r"></i></a>
                                            <a class="carousel-control-next carousel-arrow rounded-1" href="#quickView" data-bs-target="#quickView" data-bs-slide="next"><i class="icon anm anm-angle-right-r"></i></a>
                                            <!-- End Carousel arrow button -->
                                        </div>
                                        <!-- End Thumbnail image -->
                                    </div>
                                    <!-- End Model Thumbnail -->
                                    <div class="text-center mt-3"><a href="product-layout1.html" class="text-link">View More Details</a></div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">

                                    <div class="product-arrow d-flex justify-content-between">
                                        <h2 class="product-title">Product Quick View Popup</h2>
                                    </div>
                                    <div class="product-review d-flex mt-0 mb-2">
                                        <div class="rating"><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i></div>
                                        <div class="reviews ms-2"><a href="#">6 Reviews</a></div>
                                    </div>
                                    <div class="product-info">
                                        <p class="product-vendor">Vendor:<span class="text"><a href="#">Sparx</a></span></p>  
                                        <p class="product-type">Product Type:<span class="text">Caps</span></p> 
                                        <p class="product-sku">SKU:<span class="text">RF104456</span></p>
                                    </div>
                                    <div class="pro-stockLbl my-2">
                                        <span class="d-flex-center stockLbl instock d-none"><i class="icon anm anm-check-cil"></i><span> In stock</span></span>
                                        <span class="d-flex-center stockLbl preorder d-none"><i class="icon anm anm-clock-r"></i><span> Pre-order Now</span></span>
                                        <span class="d-flex-center stockLbl outstock d-none"><i class="icon anm anm-times-cil"></i> <span>Sold out</span></span>
                                        <span class="d-flex-center stockLbl lowstock" data-qty="15"><i class="icon anm anm-exclamation-cir"></i><span> Order now, Only  <span class="items">10</span>  left!</span></span>
                                    </div>
                                    <div class="product-price d-flex-center my-3">
                                        <span class="price old-price">$135.00</span><span class="price">$99.00</span>
                                    </div>
                                    <div class="sort-description">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</div>
                                    <form method="post" action="#" id="product_form--option" class="product-form">
                                        <div class="product-options d-flex-wrap">
                                            <div class="product-item swatches-image w-100 mb-3 swatch-0 option1" data-option-index="0">
                                                <label class="label d-flex align-items-center">Color:<span class="slVariant ms-1 fw-bold">Blue</span></label>
                                                <ul class="variants-clr swatches d-flex-center pt-1 clearfix">
                                                    <li class="swatch large radius available active"><img src="assets/frontend/images/products/swatches/blue-red.jpg" alt="image" width="70" height="70" data-bs-toggle="tooltip" data-bs-placement="top" title="Blue" /></li>
                                                    <li class="swatch large radius available"><img src="assets/frontend/images/products/swatches/blue-red.jpg" alt="image" width="70" height="70" data-bs-toggle="tooltip" data-bs-placement="top" title="Black" /></li>
                                                    <li class="swatch large radius available"><img src="assets/frontend/images/products/swatches/blue-red.jpg" alt="image" width="70" height="70" data-bs-toggle="tooltip" data-bs-placement="top" title="Pink" /></li>
                                                    <li class="swatch large radius available green"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="Green"></span></li>
                                                    <li class="swatch large radius soldout yellow"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="Yellow"></span></li>
                                                </ul>
                                            </div>
                                            <div class="product-item swatches-size w-100 mb-3 swatch-1 option2" data-option-index="1">
                                                <label class="label d-flex align-items-center">Size:<span class="slVariant ms-1 fw-bold">S</span></label>
                                                <ul class="variants-size size-swatches d-flex-center pt-1 clearfix">
                                                    <li class="swatch large radius soldout"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="XS">XS</span></li>
                                                    <li class="swatch large radius available active"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="S">S</span></li>
                                                    <li class="swatch large radius available"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="M">M</span></li>
                                                    <li class="swatch large radius available"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="L">L</span></li>
                                                    <li class="swatch large radius available"><span class="swatchLbl" data-bs-toggle="tooltip" data-bs-placement="top" title="XL">XL</span></li>
                                                </ul>
                                            </div>
                                            <div class="product-action d-flex-wrap w-100 pt-1 mb-3 clearfix">
                                                <div class="quantity">
                                                    <div class="qtyField rounded">
                                                        <a class="qtyBtn minus" href="#;"><i class="icon anm anm-minus-r" aria-hidden="true"></i></a>
                                                        <input type="text" name="quantity" value="1" class="product-form__input qty">
                                                        <a class="qtyBtn plus" href="#;"><i class="icon anm anm-plus-l" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>                                
                                                <div class="addtocart ms-3 fl-1">
                                                    <button type="submit" name="add" class="btn product-cart-submit w-100"><span>Add to cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="wishlist-btn d-flex-center">
                                        <a class="add-wishlist d-flex-center me-3" href="wishlist-style1.html" title="Add to Wishlist"><i class="icon anm anm-heart-l me-1"></i> <span>Add to Wishlist</span></a>
                                        <a class="add-compare d-flex-center" href="compare-style1.html" title="Add to Compare"><i class="icon anm anm-random-r me-2"></i> <span>Add to Compare</span></a>
                                    </div>
                                    <!-- Social Sharing -->
                                    <div class="social-sharing share-icon d-flex-center mx-0 mt-3">
                                        <span class="sharing-lbl">Share :</span>
                                        <a href="#" class="d-flex-center btn btn-link btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Facebook"><i class="icon anm anm-facebook-f"></i><span class="share-title d-none">Facebook</span></a>
                                        <a href="#" class="d-flex-center btn btn-link btn--share share-twitter" data-bs-toggle="tooltip" data-bs-placement="top" title="Tweet on Twitter"><i class="icon anm anm-twitter"></i><span class="share-title d-none">Tweet</span></a>
                                        <a href="#" class="d-flex-center btn btn-link btn--share share-pinterest" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin on Pinterest"><i class="icon anm anm-pinterest-p"></i> <span class="share-title d-none">Pin it</span></a>
                                        <a href="#" class="d-flex-center btn btn-link btn--share share-linkedin" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Instagram"><i class="icon anm anm-linkedin-in"></i><span class="share-title d-none">Instagram</span></a>
                                        <a href="#" class="d-flex-center btn btn-link btn--share share-whatsapp" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on WhatsApp"><i class="icon anm anm-envelope-l"></i><span class="share-title d-none">WhatsApp</span></a>
                                        <a href="#" class="d-flex-center btn btn-link btn--share share-email" data-bs-toggle="tooltip" data-bs-placement="top" title="Share by Email"><i class="icon anm anm-whatsapp"></i><span class="share-title d-none">Email</span></a>
                                    </div>
                                    <!-- End Social Sharing -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Product Quickview Modal-->

            <!--Product Promotion Popup-->
            {{-- <div class="product-notification mobile-hide" id="dismiss">
                <span class="close" aria-hidden="true"><i class="icon anm anm-times-r"></i></span>
                <div class="media d-flex align-items-center">
                    <a href="product-layout1.html" class="mediaImg"><img class="w-100 h-100 blur-up lazyload" src="assets/frontend/images/products/product2-120x170.jpg" data-src="assets/frontend/images/products/product2-120x170.jpg" alt="Cuff Beanie Cap" width="120" height="170" /></a>
                    <div class="media-body ms-3">
                        <p class="smtlt mb-0">Someone purchsed a</p>
                        <h5 class="pname"><a href="product-layout1.html">Cuff Beanie Cap</a></h5>
                        <p class="detail">12 Minutes ago from New York, USA</p>
                    </div>
                </div>
            </div> --}}
            <!--End Product Promotion Popup-->

            <!--Newsletter Modal-->
            <div class="newsletter-modal style3 modal fade" id="newsletter_modal" tabindex="-1" aria-hidden="true">           
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-body p-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="newsletter-wrap d-flex flex-column">
                                <div class="newsltr-img d-none d-sm-none d-md-block">
                                    <img class="rounded-bottom-0 blur-up lazyload" data-src="assets/frontend/images/newsletter/newsletter-s6.webp" src="assets/frontend/images/newsletter/newsletter-s6.webp" alt="Join Our Newsletter Get 20% OFF First Order" title="Join Our Newsletter Get 20% OFF First Order" width="582" height="202" />
                                </div>
                                <div class="newsltr-text text-center">
                                    <div class="wraptext mw-100">
                                        <h2 class="title text-transform-none">Join Our Newsletter <br>Get 20% OFF First Order</h2>
                                        <p class="text">Stay Informed! Monthly Tips, Tracks and Discount.</p>
                                        <form action="#" method="post" class="mcNewsletter mb-3">                               
                                            <div class="input-group">
                                                <input type="email" class="form-control input-group-field newsletter-input" name="email" value="" placeholder="Enter your email address..." required />
                                                <button type="submit" class="input-group-btn btn btn-secondary newsletter-submit" name="commit">Subscribe</button>
                                            </div>
                                        </form>
                                        <ul class="list-inline social-icons d-inline-flex justify-content-center mb-3 w-100">
                                            <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i class="icon anm anm-facebook-f"></i></a></li>
                                            <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"><i class="icon anm anm-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Pinterest"><i class="icon anm anm-pinterest-p"></i></a></li>
                                            <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Linkedin"><i class="icon anm anm-linkedin-in"></i></a></li>
                                            <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="icon anm anm-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Youtube"><i class="icon anm anm-youtube"></i></a></li>
                                        </ul>
                                        <div class="customCheckbox checkboxlink clearfix justify-content-center">
                                            <input id="dontshow" name="newsPopup" type="checkbox" />
                                            <label for="dontshow" class="mb-0">Don't show this popup again</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Newsletter Modal-->

            <div class="pswp" tabindex="-1" role="dialog">
                <div class="pswp__bg"></div>
                <div class="pswp__scroll-wrap">
                    <div class="pswp__container">
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                    </div>
                    <div class="pswp__ui pswp__ui--hidden">
                        <div class="pswp__top-bar">
                            <div class="pswp__counter"></div>
                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                            <button class="pswp__button pswp__button--share" title="Share"></button>
                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                            <div class="pswp__preloader">
                                <div class="pswp__preloader__icn">
                                    <div class="pswp__preloader__cut">
                                        <div class="pswp__preloader__donut"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                            <div class="pswp__share-tooltip"></div>
                        </div>
                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                        <div class="pswp__caption"><div class="pswp__caption__center"></div></div>
                    </div>
                </div>
            </div>



            <!-- Including Jquery/Javascript -->
            <!-- Plugins JS -->
            <script src=" {{ asset('assets/frontend/js/plugins.js') }}"></script>
            <script src=" {{ asset('assets/frontend/js/vendor/notify.js') }}"></script>
              <!-- Elevatezoom Zoom -->
              <script src="{{ asset('assets/frontend/js/vendor/jquery.elevatezoom.js')}}"></script>
              <script>
                  $(document).ready(function () {
                      /* Product Zoom */
                      function product_zoom() {
                          $(".zoompro").elevateZoom({
                              gallery: "gallery",
                              galleryActiveClass: "active",
                              zoomWindowWidth: 300,
                              zoomWindowHeight: 100,
                              scrollZoom: false,
                              zoomType: "inner",
                              cursor: "crosshair"
                          });
                      }
                      product_zoom();
                  });
              </script>
            <!-- Main JS -->
            <script src=" {{ asset('assets/frontend/js/main.js') }}"></script>
             <!-- Photoswipe Gallery JS -->
             <script src="{{ asset('assets/frontend/js/vendor/photoswipe.min.js')}}"></script>
             <script>
                 $(function () {
                     var $pswp = $('.pswp')[0],
                             image = [],
                             getItems = function () {
                                 var items = [];
                                 $('.lightboximages a').each(function () {
                                     var $href = $(this).attr('href'),
                                             $size = $(this).data('size').split('x'),
                                             item = {
                                                 src: $href,
                                                 w: $size[0],
                                                 h: $size[1]
                                             };
                                     items.push(item);
                                 });
                                 return items;
                             };
                     var items = getItems();
 
                     $.each(items, function (index, value) {
                         image[index] = new Image();
                         image[index].src = value['src'];
                     });
                     $('.prlightbox').on('click', function (event) {
                         event.preventDefault();
 
                         var $index = $(".active-thumb").parent().attr('data-slick-index');
                         $index++;
                         $index = $index - 1;
 
                         var options = {
                             index: $index,
                             bgOpacity: 0.7,
                             showHideOpacity: true
                         };
                         var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                         lightBox.init();
                     });
                 });
             </script>
            
            <!--Newsletter Modal Cookies-->
            <script>
                // $(window).ready(function() {
                //     setTimeout(function() {
                //         $('#newsletter_modal').modal("show");
                //     }, 7000);
                // });
            </script>
            <script>
                $(document).ready(function(){
                  $('#news_letter').on('submit',function(e){ 
                      e.preventDefault();
            
                  $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                      });
                  $.ajax({
                  type:'POST',
                  url:"{{ route('news.letter.store')}}",
                  data : new FormData(this),
                  contentType: false,
                  cache: false,
                  processData : false,
                  success:function(response){
                    console.log(response);
                   // $('#alert').html('<div class="alert alert-success">'+response.message+'</div>');
                   $.notify(response.message, "success");
                    setTimeout(function(){
                     location.reload();
                  },500);
                  },
                  error:function(response){
                      console.log(response.responseText);
                      if (jQuery.type(response.responseJSON.errors) == "object") {
                        $('#alert').html('');
                      $.each(response.responseJSON.errors,function(key,value){
                        //   $('#alert').append('<div class="alert alert-danger">'+value+'</div>');
                         $.notify(value, "error");
                      });
                      } else {
                        // $('#alert').html('<div class="alert alert-danger">'+response.responseJSON.errors+'</div>');
                         $.notify(response.responseJSON.errors, "error");
                      }
                  },
                  beforeSend : function(){
                    $('#reg_btn_news').html('<i class="fa fa-spinner fa-pulse fa-spin"></i> loading..........');
                    $('#reg_btn_news').attr('disabled', true);
                    },
                    complete : function(){
                    $('#reg_btn_news').html('<i class="fa fa-save"></i> Subscribe');
                    $('#reg_btn_news').attr('disabled', false);
                    }
                  });
              });
              });
            </script>
            <!--End Newsletter Modal Cookies-->
            @stack('scripts')

        </div>
        <!--End Page Wrapper-->
    </body>

<!-- Mirrored from www.annimexweb.com/items/hema/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Mar 2024 06:21:02 GMT -->
</html>