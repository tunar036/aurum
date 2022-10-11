@extends('layouts.backend.master')
@section('title', trans('backend.titles.home-cat-products'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/datepicker.min.css') }}">
    <style>
        .select2 {
            width:100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div id="app" class="container">
                <div class="card card-custom example example-compact">
                    <form action="{{ $edit === false ? route('backend.home-cat-products.store') :  route('backend.home-cat-products.update', ['home_cat_product' => $home_cat_product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-left" for="parent_category_id">
                                            @lang('backend.labels.category')
                                        </label>
                                        <select id="parent_category_id"
                                                class="form-control select2">
                                            <option selected value="" disabled>Seçin</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}" {{ isset($home_cat_product) && $home_cat_product->category->parent->id ==  $category->id ? 'selected' : '' }}>
                                                    {{ $category->transname }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-left" for="sub_category_id">
                                            @lang('backend.labels.subcategories')
                                        </label>
                                        <select id="sub_category_id" class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id" >
                                            <option selected value="" disabled>Seçin</option>
                                            @if(isset($home_cat_product))
                                            @forelse ($home_cat_product->category->parent->subcategories as $category)
                                                <option value="{{ $category->id }}" {{ isset($home_cat_product) && $home_cat_product->category_id ==  $category->id ? 'selected' : '' }}>
                                                    {{ $category->transname }}
                                                </option>
                                            @empty
                                            @endforelse
                                                @endif
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>
                                            @lang('backend.labels.image')
                                        </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input id="image" type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" accept="image/*">
                                                    <label for="image" class="custom-file-label">
                                                        @lang('backend.placeholders.choose.image')
                                                    </label>
                                                </div>
                                                @error('image')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>
                                            @lang('backend.labels.status')
                                        </label>
                                        <div class="input-group">
                                      <span class="switch switch-md switch-icon">
                                          <label>
                                              <input type="checkbox" class="bool" name="status" value="{{ $home_cat_product->status ?? old('status') }}"
                                                     @if(isset($home_cat_product) ? $home_cat_product->status : old('status') == 1 ) checked @else checked @endif>
                                              <span></span>
                                          </label>
                                      </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('backend.includes.form.footer')
                    </form>

                    <div class="card-body">
                        @if ($edit)
                            @include('backend.includes.media',[
                                'model' => $home_cat_product,
                                'name'  => 'home-cat-products',
                                'media_collection_name'  => 'home_cat_image',
                                'isDeleted' => true,
                                'isCovered' => false,
                            ])
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('/backend/js/datepicker.min.js') }}"></script>

    <script>

        $(function () {

            let select2 = $('.select2');
            select2.select2({
                minimumResultsForSearch: 3,
                theme: 'bootstrap4',
                placeholder: 'Axtardığınız'
            });
        });

        $('#parent_category_id').on('change', function (e) {
            e.preventDefault();
            let id = $(this).children('option:selected').val();
            $.ajax({
                url: '{{ route('backend.categories.getSubCategories') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function (data) {
                    $('#sub_category_id').html(data.html);
                }
            });
        });
    </script>

@endsection
