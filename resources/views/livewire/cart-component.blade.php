<main id="main" class="main-site">

<!-- Modal Cash-->
<div class="modal faded" id="cashModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cashModalLabel"></h1>
                </div>
                <div class="modal-body">
                    <!-- Profile with Image  -->
                    <div class="modal-body">
                        <div class="banner-countdown">
                            <table>
                             <style>
                               h4 {text-align: center;}
                               td {text-align: center;}
                               .wrap-countdown{text-align: center;}
                             </style>
                                <tr>
                                        <h4><b>Payment in progress</b></h4>
                                </tr>
                                <br>
                                <tr>
                                <div class="wrap-countdown mercado-countdown" data-expire="2023/12/12 12:34:56"></div>
                                </tr>
                                <tr>
                                    <td>
                                      <button class="w3-button w3-green" data-dismiss="modal">Complete</button>
                                    </td>
                                </tr>
                                <br><br>
                                <tr>
                                    <td>
                                      <button class="w3-button w3-red" data-dismiss="modal">Cancel</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal QR-->
<div class="modal faded" id="qrModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="qrModalLabel"></h1>
                </div>
                <div class="modal-body">
                    <!-- Profile with Image  -->
                    <div class="modal-body">
                        <div class="banner-countdown">
                            <table>
                             <style>
                               img {text-align: center;}
                               h4 {text-align: center;}
                               tr {text-align: center;}
                               td {text-align: center;}
                               .wrap-countdown{text-align: center;}
                             </style>
                                <tr>
                                        <h4><b>Payment in progress</b></h4>
                                </tr>
                                <br>
                                <tr>
                                <div class="wrap-countdown mercado-countdown" data-expire="2023/12/12 12:34:56"></div>
                                </tr>
                                <br>
                                <tr>
                                    <center><img
                                            src="https://www.iium.edu.my/media/68540/3.png"
                                            alt="qrcode" style="width:300px;height:400px;"></center>
                                </tr>
                                <br><br>
                                <tr>
                                    <td>
                                      <button class="w3-button w3-red" data-dismiss="modal">Close</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Checkout-->
    <div class="modal faded" id="checkoutModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="checkoutModalLabel"></h1>
                </div>
                    <table style="width:100%">
                        <style>
                          h5 {text-align: center;}
                          h1 {text-align: center;}
                          th{text-align: center;}
                          img{text-align: center;}
                        </style>
                         <tr>
                          <th>
                           <!-- Profile Details  -->
                            <div class="modal-body">
                             <button class="banner-countdown" href="#" data-toggle="modal" data-target="#cashModal" data-dismiss="modal">
                             <h5><b>Pay via</b></h5>
                             <h1>Cash <br>
                             </h1>
                             <img
                                            src="https://logodix.com/logo/1099301.jpg"
                                            alt="cash" style="width:130px;height:100px;">
                            </div>
                          </th>
                          <th>
                           <!-- Profile Details  -->
                            <div class="modal-body">
                            <button class="banner-countdown" href="#" data-toggle="modal" data-target="#qrModal" data-dismiss="modal">
                             <h5><b>Pay via</b></h5>
                             <h1>QR Pay <br>
                             </h1>
                             <img
                                            src="https://www.agrobank.com.my/wp-content/uploads/2021/06/DuitNow-QR-Logo_FA2.png"
                                            alt="QR" style="width:110px;height:100px;">
                            </div>
                          </th>
                         </tr>
                     </table>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ url('/') }}" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="wrap-iten-in-cart">
                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong> {{Session::get('success_message')}}
                    </div>
                @endif
                @if(Cart::count() > 0)
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @foreach (Cart::content() as $item)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                        </div>
                        <div class="price-field produtc-price">
                            <p class="price">RM {{ $item->model->regular_price }}</p>
                        </div>
                        <div class="quantity">
                            <div class="quantity-input" style="width: 50px">
                                <input type="text" name="product-quatity" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*" disabled>
                            </div>
                        </div>
                        <div class="price-field sub-total">
                            <p class="price">RM {{ $item->subtotal }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                    <p>No item in Cart</p>
                @endif
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">RM {{ Cart::subtotal() }}</b></p>
                    <p class="summary-info"><span class="title">Service Tax</span><b class="index">RM {{ Cart::tax() }}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                </div>
                <div class="checkout-info">
                    <a class="btn btn-checkout" href="#" data-toggle="modal" data-target="#checkoutModal">Check out</a>
                    <a class="link-to-shop" href="{{ url('/shop') }}">Continue Shopping<i class="fa fa-arrow-circle-right"
                            aria-hidden="true"></i></a>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                </div>
            </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_04.jpg') }}" width="214" height="214"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}" width="214" height="214"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_15.jpg') }}" width="214" height="214"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_01.jpg') }}" width="214" height="214"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_21.jpg') }}" width="214" height="214"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_03.jpg') }}" width="214" height="214"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_04.jpg') }}" width="214" height="214"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_05.jpg') }}" width="214" height="214"
                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End wrap-products-->
            </div>

        </div>
        <!--end main content area-->
    </div>
    <!--end container-->

</main>
