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

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-8 clearfix">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                <form action="{{route('cart.checkout')}}" method="post">
                                    @csrf
                                    <input name="name" type="text" placeholder="Ship name">
                                    <input name="address" type="text" placeholder="Ship Address">
                                    <textarea name="note"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                                    <label><button type="submit" class="btn btn-primary">Thanh toán</button></label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
