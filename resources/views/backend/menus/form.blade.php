@extends('layouts.backend.master')
@section('title', trans('backend.titles.menus'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">
    <style>
        .select2 {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'menus'])
                    <form
                        action="{{ $edit === false ? route('backend.menus.store') : route('backend.menus.update', ['menu' => $menu->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <ul class="nav nav-light-primary nav-pills" role="tablist">
                                        @foreach ($langs as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if ($loop->first) active @endif"
                                                    id="tab-{{ $lang->code }}" data-toggle="tab"
                                                    href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content mt-5">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if ($loop->first) active show @endif"
                                        id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="name:{{ $lang->code }}"
                                                class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.name') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="name:{{ $lang->code }}" type="text"
                                                        class="form-control @if ($errors->has("name:$lang->code")) is-invalid @endif"
                                                        name="name:{{ $lang->code }}"
                                                        value="{{ isset($menu) ? optional($menu->translate($lang->code))->name : old('name:' . $lang->code) }}"
                                                        placeholder="@lang('backend.placeholders.enter.name')">
                                                    @if ($errors->has("name:$lang->code"))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first("name:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="slug:{{ $lang->code }}"
                                                class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.slug') ({{ strtoupper($lang->code) }})
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="slug:{{ $lang->code }}" type="text"
                                                        class="form-control @if ($errors->has("slug:$lang->code")) is-invalid @endif"name="slug:{{ $lang->code }}"
                                                        value="{{ isset($menu) ? optional($menu->translate($lang->code))->slug : old('slug:' . $lang->code) }}"
                                                        placeholder="@lang('backend.placeholders.enter.slug')">
                                                    @if ($errors->has("slug:$lang->code"))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first("slug:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keywords:{{ $lang->code }}"
                                                class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.meta_keywords') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="keywords:{{ $lang->code }}" type="text"
                                                        class="form-control tagify-{{ $lang->code }} @if ($errors->has("keywords:$lang->code")) is-invalid @endif"
                                                        name="keywords:{{ $lang->code }}"
                                                        value="{{ isset($menu) ? optional($menu->translate($lang->code))->keywords : old('keywords:' . $lang->code) }}"
                                                        placeholder="@lang('backend.placeholders.enter.meta_keywords')">
                                                    @if ($errors->has("keywords:$lang->code"))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first("keywords:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description:{{ $lang->code }}"
                                                class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.meta_description') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="description:{{ $lang->code }}" type="text"
                                                        class="form-control @if ($errors->has("description:$lang->code")) is-invalid @endif"
                                                        name="description:{{ $lang->code }}"
                                                        value="{{ isset($menu) ? optional($menu->translate($lang->code))->description : old('description:' . $lang->code) }}"
                                                        placeholder="@lang('backend.placeholders.enter.meta_description')">
                                                    @if ($errors->has("description:$lang->code"))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first("description:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="title:{{ $lang->code }}"
                                                class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.title') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="title:{{ $lang->code }}" type="text"
                                                        class="form-control @if ($errors->has("title:$lang->code")) is-invalid @endif"
                                                        name="title:{{ $lang->code }}"
                                                        value="{{ isset($menu) ? optional($menu->translate($lang->code))->title : old('title:' . $lang->code) }}"
                                                        placeholder="@lang('backend.placeholders.enter.title')">
                                                    @if ($errors->has("title:$lang->code"))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first("title:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                                @lang('backend.labels.content') ({{ strtoupper($lang->code) }})
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <textarea class="summernote @if ($errors->has("text:$lang->code")) is-invalid @endif" name="text:{{ $lang->code }}"
                                                        placeholder="@lang('backend.placeholders.enter.content')">
                                                      {!! isset($menu) ? optional($menu->translate($lang->code))->text : old('text:' . $lang->code) !!}
                                                   </textarea>`
                                                    @if ($errors->has("text:$lang->code"))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first("text:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <label for="positions" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Pozisiyanı seç
                                    <span class="text-danger">*</span>

                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <select name="positions[]" id="positions"
                                            class="form-control select2  @error('positions') is-invalid @enderror"
                                            multiple>
                                            <option
                                                value="header"{{ $edit && in_array('header', $menu->positions) ? 'selected' : '' }}>
                                                Üst</option>
                                            <option
                                                value="footer"{{ $edit && in_array('footer', $menu->positions) ? 'selected' : '' }}>
                                                Aşağı</option>
                                        </select>
                                        @error('positions')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group row"> --}}
                            {{-- <label for="parent_id" class="col-form-label text-right col-lg-3 col-sm-12"> --}}
                            {{-- @lang('backend.labels.parent') --}}
                            {{-- <span class="text-danger">*</span> --}}
                            {{-- </label> --}}
                            {{-- <div class="col-lg-6 col-md-9 col-sm-12"> --}}
                            {{-- <div class="form-group"> --}}
                            {{-- <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror"> --}}
                            {{-- <option disabled value="">@lang('backend.placeholders.select.parent')</option> --}}
                            {{-- <option value="0"> --}}
                            {{-- @lang('backend.mixins.no_parent') --}}
                            {{-- </option> --}}
                            {{-- @foreach ($menus as $men) --}}
                            {{-- @if ($edit && $men['id'] == $menu['id']) @continue @endif --}}
                            {{-- <option value="{{ $men['id'] }}" {{ ($edit && $men['id']==$menu['parent_id']) ? 'selected' : '' }}  @if (old('parent_id') == $men->id) selected @endif> --}}
                            {{-- @if ($men->parent_id != 0) └ @endif --}}
                            {{-- {{ optional($men->translate($locale))->name ?? '' }} --}}
                            {{-- </option> --}}
                            {{-- @if ($men->children) --}}
                            {{-- @include('backend.includes.recursive',[ --}}
                            {{-- 'subcategories' => $men->children, --}}
                            {{-- 'model' => !$edit ?: $menu --}}
                            {{-- ]) --}}
                            {{-- @endif --}}
                            {{-- @endforeach --}}
                            {{-- </select> --}}
                            {{-- @error('parent_id') --}}
                            {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                            {{-- @enderror --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <span class="switch switch-md switch-icon">
                                            <label>
                                                <input type="checkbox" class="bool" name="status"
                                                    value="{{ isset($menu) ? $menu->status : old('status') }}"
                                                    {{ (isset($menu) ? old('status', $menu->status) : old('status', 1)) == 1 ? 'checked' : '' }}>
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.background_image')
                                    @if (!$edit)
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                name="background_image">
                                            <label class="custom-file-label">
                                                @lang('backend.placeholders.choose.image')
                                            </label>
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('backend.includes.form.footer')
                    </form>

                    <div class="card-body">
                        @if ($edit)
                            @include('backend.includes.media', [
                                'model' => $menu,
                                'name' => 'menus',
                                'media_collection_name' => 'background_images',
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
    <script>
        var select2 = $('.select2');

        select2.select2({
            minimumResultsForSearch: 20,
            theme: 'bootstrap4',
            placeholder: 'Axtardığınız'
        });

        let key_az = document.querySelector('.tagify-az');
        let key_en = document.querySelector('.tagify-en');
        let key_ru = document.querySelector('.tagify-ru');

        new Tagify(key_az);
        new Tagify(key_en);
        new Tagify(key_ru);

        $('.summernote').summernote({
            height: 300,
            imageAttributes: {
                icon: '<i class="note-icon-pencil"/>',
                figureClass: 'figureClass',
                figcaptionClass: 'captionClass',
                captionText: 'Caption Goes Here.',
                manageAspectRatio: true
            },
            lang: 'en-US',
            popover: {
                image: [
                    ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']],
                    ['custom', ['imageAttributes']],
                ],
            },
        });
    </script>
@endsection
