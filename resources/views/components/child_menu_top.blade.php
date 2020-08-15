@if($category->categoryChildrent()->count())
    <ul role="menu" class="sub-menu">
        @foreach($category->categoryChildrent()->get() as $child)
            <li>
                <a href="{{route('category.product', ['slug'=>$child->slug, 'id'=>$child->id])}}">{{$child->name}}</a>

                @if($child->categoryChildrent()->count())
                @include('components.child_menu_top', ['category'=>$child])
                @endif
            </li>
        @endforeach
    </ul>
@endif
