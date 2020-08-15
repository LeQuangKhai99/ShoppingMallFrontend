<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categorys as $key => $cate)
            <li class="{{$key == 0 ? 'active' : ''}}"><a href="#{{$cate->slug}}" data-toggle="tab">{{$cate->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categorys as $key => $cate)
        <div class="tab-pane fade {{$key == 0 ? 'active in' : ''}}" id="{{$cate->slug}}" >

            @foreach($cate->products()->take(4)->get() as $product)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img style="width: 184px; height: 184px" src="{{$base_url.$product->feature_image_path}}" alt="" />
                            <h2>{{number_format($product->price)}}</h2>
                            <p>{{$product->name}}</p>
                            <a href="{{route('product.detail', ['slug'=>$product->slug, 'id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>


        @endforeach
    </div>
</div>
