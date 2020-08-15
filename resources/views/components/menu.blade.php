<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse" >
        <li><a href="{{route('home')}}" class="active">Home</a></li>
        @foreach($categorys as $category)
        <li class="dropdown"><a href="#">{{$category->name}}@if($category->categoryChildrent()->count())<i class="fa fa-angle-down">@endif</i></a>
            @include('components.child_menu_top', ['category' => $category])
        </li>
        @endforeach
        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>
