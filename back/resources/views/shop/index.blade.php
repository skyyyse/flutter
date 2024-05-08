<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    @include('shop.includes.head')
</head>

<body>
    @include('shop.includes.header')
    <main>
        @include('shop.includes.carousel')
        <section class="section-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="box shadow-lg">
                            <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                            <h2 class="font-weight-semi-bold m-0">Quality Product</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <div class="box shadow-lg">
                            <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div>
                            <h2 class="font-weight-semi-bold m-0">Free Shipping</h2>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="box shadow-lg">
                            <div class="fa icon fa-exchange-alt text-primary m-0 mr-3"></div>
                            <h2 class="font-weight-semi-bold m-0">14-Day Return</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <div class="box shadow-lg">
                            <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                            <h2 class="font-weight-semi-bold m-0">24/7 Support</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-3">
            <div class="container">
                <div class="section-title">
                    <h2>Categories</h2>
                </div>
                <div class="row pb-3">
                    @foreach ($categories as $category )
                    <div class="col-lg-3">
                        <div class="cat-card">
                            <div class="left">
                                <img src="{{asset('shop/images/cat-1.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="right">
                                <div class="cat-data">
                                    <h2>{{$category->name}}</h2>
                                    <p>100 Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-4 pt-5">
            <div class="container">
                <div class="section-title">
                    <h2>Featured Products</h2>
                </div>
                <div class="row pb-3">
                    @foreach ($products as $products)
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                @foreach ($products->products_image as $products_image )
                                <a href="" class="product-img"><img class="card-img-top" src="{{ asset('images/' . $products_image->image) }}" alt=""></a>
                                @endforeach
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">{{$products->title}}</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>${{$products->price}}</strong></span>
                                    <span class="h6 text-underline"><del>${{$products->compare_price}}</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-4 pt-5">
            <div class="container">
                <div class="section-title">
                    <h2>Latest Produsts</h2>
                </div>
                <div class="row pb-3">
                    @foreach ($last_products as $last_products)
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                @foreach ($products->products_image as $products_image )
                                     <a href="" class="product-img"><img class="card-img-top" src="{{ asset('images/' . $products_image->image) }}" alt=""></a>
                                @endforeach
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('shop/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('shop/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('shop/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('shop/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('shop/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('shop/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('shop/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
    </main>
    @include('shop.includes.footer')
</body>

</html>
