@extends('layouts.master')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link href="{{asset('/home/home.css')}}>">
@endsection

@section('js')
    <script src="{{asset('/home/home.js')}}"></script>
@endsection
@php
    $base_url = config('app.base_url');
@endphp
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('components.sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{$base_url.$product->feature_image_path}}" alt="" />
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach($product->productImages()->get() as $key =>$image)
                                    @if($key == 0 || $key %3 == 0)
                                        @if($key != 0)
                            </div>
                                            @endif
                                        <div class="item {{$key==0?"active":""}}">
                                            <a href=""><img style="width: 85px; height: 85px" src="{{$base_url.$image->image_path}}" alt=""></a>
                                    @else
                                            <a href=""><img style="width: 85px; height: 85px" src="{{$base_url.$image->image_path}}" alt=""></a>
                                    @endif

                                @endforeach
                                        </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="/eshopper/images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{$product->name}}</h2>
                            <img src="/eshopper/images/product-details/rating.png" alt="" />
                            <form method="post" action="{{route('cart.add')}}">
                                @csrf
                                <span>
									<span>{{number_format($product->price)}}</span>
									<label>Quantity:</label>
									<input type="number" min="1" max="10" value="1" name="quantity" />
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                            </form>

                            <p><b>Brand:</b> {{$product->category->name}}</p>
                            <a href=""><img src="/eshopper/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            @foreach($product->productImages()->get() as $image)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/eshopper/images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($recomendProduct as $key => $value)
                            @if($key % 3== 0)
                                    <div class="item {{$key == 0? 'active' : ''}}">
                                @endif
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="width: 255px; height: 255px" src="{{$base_url.$value->feature_image_path}}" alt="" />
                                                <h2>{{number_format($value->price)}}</h2>
                                                <p>{{$value->name}}</p>
                                                <a href="{{route('product.detail', ['slug'=>$value->slug, 'id'=>$value->id])}}" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($key % 3 == 2)
                        </div>
                                    @endif
                            @endforeach
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
@endsection
