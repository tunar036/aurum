@extends('layouts.backend.master')
@section('title', trans('backend.titles.categories'))
@section('styles')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'categories'])
                    <form action="{{ $edit === false ? route('backend.categories.store') : route('backend.categories.update', ['category' => $category->id])  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <ul class="nav nav-light-primary nav-pills" role="tablist">
                                        @foreach ($langs as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif" id="tab-{{ $lang->code }}" data-toggle="tab" href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content mt-5">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif" id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="name:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.name') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="name:{{ $lang->code }}" type="text" class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif"  name="name:{{ $lang->code }}" value="{{ isset($category) ? $category->translate($lang->code)->name : old('name:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.name')">
                                                    @if ($errors->has("name:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("name:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="slug:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.slug') ({{ strtoupper($lang->code) }})
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="slug:{{ $lang->code }}" type="text" class="form-control @if($errors->has("slug:$lang->code")) is-invalid @endif"name="slug:{{ $lang->code }}" value="{{ isset($category) ? $category->translate($lang->code)->slug : old('slug:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.slug')">
                                                    @if ($errors->has("slug:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("slug:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="title:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.meta_title') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="title:{{ $lang->code }}" type="text" class="form-control @if($errors->has("title:$lang->code")) is-invalid @endif" name="title:{{ $lang->code }}" value="{{ isset($category) ? $category->translate($lang->code)->title : old('title:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.meta_title')">
                                                    @if ($errors->has("title:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("title:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keywords:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.meta_keywords') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="keywords:{{ $lang->code }}" type="text" class="form-control tagify-{{ $lang->code }} @if($errors->has("keywords:$lang->code")) is-invalid @endif" name="keywords:{{ $lang->code }}" value="{{ isset($category) ? $category->translate($lang->code)->keywords : old('keywords:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.meta_keywords')">
                                                    @if ($errors->has("keywords:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("keywords:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.meta_description') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="description:{{ $lang->code }}" type="text" class="form-control @if($errors->has("description:$lang->code")) is-invalid @endif"  name="description:{{ $lang->code }}" value="{{ isset($category) ? $category->translate($lang->code)->description : old('description:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.meta_description')">
                                                    @if ($errors->has("description:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("description:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{--<div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.icon')
                                    @if(!$edit)
                                      <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('icon') is-invalid @enderror" name="icon" accept="image/*">
                                            <label class="custom-file-label">
                                                @lang('backend.placeholders.choose.icon')
                                            </label>
                                        </div>
                                        @error('icon')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div--}}>

{{--
                            <div class="form-group row">
                                <label for="image_alt:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.image_alt') ({{ strtoupper($lang->code) }})
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="image_alt:{{ $lang->code }}" type="text" class="form-control @if($errors->has("image_alt:$lang->code")) is-invalid @endif" name="image_alt:{{ $lang->code }}" value="{{ isset($category) ? $category->translate($lang->code)->image_alt : old('image_alt:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.image_alt')">
                                        @if ($errors->has("image_alt:$lang->code"))
                                            <div class="invalid-feedback">{{ $errors->first("image_alt:$lang->code") }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
--}}


                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.image')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="image" type="file" class="custom-file-input @error('image') is-invalid @enderror" name="cover" accept="image/*">
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

                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.images')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="images" type="file" class="custom-file-input @error('images') is-invalid @enderror" name="image[]" accept="image/*" multiple>
                                            <label for="images" class="custom-file-label">
                                                @lang('backend.placeholders.choose.images')
                                            </label>
                                        </div>
                                        @error('images')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

{{--
                            <div class="form-group row">
                                <label for="parent_id" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.parent')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                            <option disabled value="">@lang('backend.placeholders.select.parent')</option>
                                            <option value="0">
                                                @lang('backend.mixins.no_parent')
                                            </option>
                                            @foreach($categories as $cat)
                                                @if($edit && $cat['id']==$category['id']) @continue @endif
                                                <option value="{{ $cat['id'] }}" {{ ($edit && $cat['id']==$category['parent_id']) ? 'selected' : '' }}  @if(old('parent_id') == $cat->id) selected @endif>
                                                    @if($cat->parent_id != 0) └ @endif
                                                        {{ optional($cat->translate($locale))->name ?? '' }}
                                                </option>
                                                    @if($cat->children)
                                                        @include('backend.includes.recursive',[
                                                        'subcategories' => $cat->children,
                                                        'model' => !$edit ?: $category
                                                        ])
                                                    @endif
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
--}}

{{--
                            <div class="form-group row">
                                <label for="mega" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Mega menu
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select id="mega" name="mega" class="form-control @error('mega') is-invalid @enderror">
                                        <option value="" disabled>Seçin</option>
                                        <option value="{{ old('mega','1') }}" {{  old('mega',$category->mega ?? '') == '1' ? 'selected' : ''  }}>Mega menyudur</option>
                                        <option value="{{ old('mega','0') }}" {{  old('mega',$category->mega ?? '') == '0' ? 'selected' : '' }}>Mega menyu deyil</option>
                                    </select>
                                </div>
                                @error('mega')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
--}}
{{--
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    Ana səhifə header-da görünsün
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input  type="checkbox" class="bool" name="home" value="{{ old('home','0') }}"  {{ old('home',$category->home ?? '0') == 1 ? 'checked' : '' }}>
                                                 <span></span>
                                             </label>
                                         </span>
                                    </div>
                                </div>
                            </div>
--}}
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input  type="checkbox" class="bool" name="status" value="{{ old('status','1') }}"  {{   old('status',$category->status ?? '1') == 1 ? 'checked' : '' }}>
                                                 <span></span>
                                             </label>
                                         </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                  <div class="card-body">
                      @if ($edit)
                          @include('backend.includes.media',[
                              'model' => $category,
                              'name'  => 'categories',
                              'media_collection_name'  => 'category_image',
                              'isDeleted' => true,
                              'isCovered' => false,
                          ])
                          @include('backend.includes.media',[
                              'model' => $category,
                              'name'  => 'categories',
                              'media_collection_name'  => 'category_images',
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
    <script>
        let key_az = document.querySelector('.tagify-az');
        let key_en = document.querySelector('.tagify-en');
        let key_ru = document.querySelector('.tagify-ru');

        new Tagify(key_az);
        new Tagify(key_en);
        new Tagify(key_ru);

        $('.summernote').summernote({
            height:300,
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
