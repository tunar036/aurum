@if(!empty($categories))
    <div class="header_menu">
        @foreach($categories as $category)
            @if($category->home)
            <a href="{{ $category->appUrl }}" class="header_menu-item">
                <img src="{{ $category->getFirstMediaUrl('category_icon')  }}" alt="{{ $category->transname }}"> {{ $category->transname }}
            </a>
            @endif
        @endforeach
    </div>
@endif
