@if(count($category->categoryChildrent()->get()) > 0)
    <div id="{{$category->id }}" class="panel-collapse collapse">
        <div class="panel-body">
            <ul>
                @foreach($category->categoryChildrent()->get() as $childrent)
                    <li>
                        <a href="{{route('category.product', ['slug'=>$childrent->slug, 'id'=>$childrent->id])}}">{{$childrent->name}}</a>
                        @if($childrent->categoryChildrent->count())
                            @include('components.child_menu_sidebar', ['category'=>$childrent])
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
