<section id="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-section">
            <div class="breadcrumbs-links">
                <a href="{{ route('frontend.home') }}" class="prev-page">{{__('frontend.home.homepage')}}</a>
                <span>/</span>
                @if(!empty($prev_page_name) && !empty($prev_page_url))
                <a href="{{ $prev_page_url }}" class="prev-page">{{ $prev_page_name }}</a>
                <span>/</span>
                @endif
                <a href="javascript:void(0)" class="selected-page">{{ $current_page ?? '' }}</a>
            </div>
            <h1 class="breadcrumbs-page">{{ $current_page ?? '' }}</h1>
        </div>
    </div>
</section>
