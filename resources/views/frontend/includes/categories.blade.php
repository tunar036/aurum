<section id="category">
    <div class="container">
        <div class="category-section">
            <div class="categories">
                <button class="categories-button">
                    <img src="{{ asset('/frontend/img/svg/bar.svg') }}" alt="" class="menu-icon active-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 14.2951C-0.0976311 14.6856 -0.097631 15.3188 0.292893 15.7093C0.683418 16.0998 1.31658 16.0998 1.70711 15.7093L8.0011 9.41531L14.2951 15.7093C14.6856 16.0998 15.3188 16.0998 15.7093 15.7093C16.0998 15.3188 16.0998 14.6856 15.7093 14.2951L9.41531 8.0011L15.7093 1.70711C16.0998 1.31658 16.0998 0.683417 15.7093 0.292893C15.3188 -0.0976312 14.6856 -0.0976308 14.2951 0.292893L8.0011 6.58688L1.70711 0.292894C1.31658 -0.0976307 0.683418 -0.0976307 0.292893 0.292894C-0.0976311 0.683418 -0.0976311 1.31658 0.292893 1.70711L6.58688 8.0011L0.292893 14.2951Z" fill="#549480"/>
                    </svg>
                    Kataloq
                </button>
                <ul class="all-categories">
                    @foreach($categories as $category)
                        <li class="category-item">
                            <img src="{{ $category->getFirstMediaUrl('category_icon','thumb-small') }}" alt="{{ $category->transname }}" title="{{ $category->transname }}">
                            <a href="{{ $category->appUrl }}" class="text-dark">{{ $category->transname }}</a>
                            <img src="{{ asset('/frontend/img/svg/angle-right.svg') }}">
                            @if(count($category->subcategories))
                                <ul class="all_category-items">
                                    @foreach($category->subcategories as $subcategory)
                                        <li class="item-title">
                                            <a href="{{ $subcategory->appUrl }}" class="text-success">{{ $subcategory->transname }}</a>
                                            @include('frontend.includes.categories.subcategory',['subcategories' => $subcategory->subcategories])
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            @include('frontend.includes.search')
        </div>
    </div>
</section>
