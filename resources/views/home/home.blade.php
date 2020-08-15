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

    <!--/slider-->
    @include('home.components.slider')
    <!--/slider-->
    @php
    if (session()->get('mess') != null){
        echo '<script>alert("'.session()->get('mess').'")</script>';
        session()->forget('mess');
    }
    @endphp
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('components.sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('home.components.feature_product')
                    <!--features_items-->
                    <!--/category-tab-->
                    @include('home.components.tab_category')
                    <!--/recommended_items-->
                    @include('home.components.recomend_product')
                    <!--/recommended_items-->
                </div>
            </div>
        </div>
    </section>

@endsection
