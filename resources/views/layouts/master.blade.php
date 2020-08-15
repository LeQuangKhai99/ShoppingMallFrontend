<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('/eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/eshopper/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/eshopper/css/main.css')}}" rel="stylesheet">
    @yield('css')
    @yield('title')
</head>
<body>

@include('components.header')
@yield('content')
@include('components.footer')


<script src="{{asset('/eshopper/js/jquery.js')}}"></script>
<script src="{{asset('/eshopper/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/eshopper/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('/eshopper/js/price-range.js')}}"></script>
<script src="{{asset('/eshopper/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('/eshopper/js/main.js')}}"></script>
<script>
    $('#search1').on("submit", function(event) {
        if($('.search_result').val().length <= 0){
            alert('Chưa nhập nội dung');
            event.preventDefault();
        }
    });
</script>
@yield('js')
</body>

</html>
