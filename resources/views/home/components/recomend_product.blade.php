<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($recomendProduct as $key => $value)
                    @if($key < ceil(count($recomendProduct)/2))
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img style="width: 183px; height: 161px;" src="{{$base_url.$value->feature_image_path}}" alt="" />
                                        <h2>{{number_format($value->price)}}</h2>
                                        <p>{{$value->name}}</p>
                                        <a href="{{route('product.detail', ['slug'=>$value->slug, 'id'=>$value->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="item">
                @foreach($recomendProduct as $key => $value)
                    @if($key >= ceil(count($recomendProduct)/2))
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img style="width: 183px; height: 161px;" src="{{$base_url.$value->feature_image_path}}" alt="" />
                                        <h2>{{number_format($value->price)}}</h2>
                                        <p>{{$value->name}}</p>
                                        <a href="{{route('product.detail', ['slug'=>$value->slug, 'id'=>$value->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
