@if(count($subcategories))
    <ul>
        @foreach($subcategories as $subcategory)
            <li>
                <a href="{{ $subcategory->appUrl }}">{{ $subcategory->transname }}</a>
            </li>
        @endforeach
    </ul>
@endif
