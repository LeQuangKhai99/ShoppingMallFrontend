@extends('layouts.master')
@section('title')
    <title>Giỏ hàng</title>
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
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @if($cart != null)
                    @foreach($cart as $item)
                        <form action="{{route('cart.update')}}" method="post">
                            @csrf
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img style="width: 110px; height: 110px" src="{{$base_url.$item['product']->feature_image_path}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$item['product']->name}}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>{{number_format($item['product']->price)}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input type="hidden" name="product_id" value="{{$item['product']->id}}">
                                        <input class="cart_quantity_input" type="number" min="1" max="10" name="quantity" value="{{$item['quantity']}}">
                                    </div>
                                </td>
                                <td class="cart_total">
                                    @php $total += $item['quantity'] * $item['product']->price; @endphp
                                    <p class="cart_total_price">{{number_format($item['quantity'] * $item['product']->price)}}</p>
                                </td>
                                <td class="cart_delete">
                                    <button type="submit" class="button button-primate">update</button>
                                    <a class="cart_quantity_delete" href="{{route('cart.delete', ['id'=>$item['product']->id])}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        </form>

                    @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
            <h2>Total: {{number_format($total)}} VND</h2>
            <div style="margin: 30px">

                <a href="{{route('cart.checkout')}}" style="float: right" type="button" class="btn btn-primary">Thanh toán</a>
            </div>
        </div>
    </section>
@endsection
