<div class="tab-pane fade @if($loop->first) active show @endif" id="naming" role="tabpanel" aria-labelledby="tab-naming">
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <ul class="nav nav-light-primary nav-pills" role="tablist">
                @foreach ($langs as $lang)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif" id="tab-naming-{{ $lang->code }}" data-toggle="tab" href="#naming-{{ $lang->code }}">
                            <span class="nav-text">{{ $lang->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.name')
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @endif" name="name" value="{{ isset($product) ? $product->name : old('name') }}" placeholder="@lang('backend.placeholders.enter.name')">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="slug" class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.slug')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input id="slug" type="text" class="form-control @error('slug') is-invalid @endif" name="slug" value="{{ isset($product) ? $product->slug : old('slug') }}" placeholder="@lang('backend.placeholders.enter.slug')">
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="tab-content">
        @foreach ($langs as $lang)
            <div class="tab-pane fade @if($loop->first) active show @endif" id="naming-{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-naming-{{ $lang->code }}">
                <div class="form-group row">
                    <label for="text:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                        @lang('backend.labels.content') ({{ strtoupper($lang->code) }})
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <div class="input-group">
                            <textarea id="text:{{ $lang->code }}" class="summernote @if($errors->has("text:$lang->code")) is-invalid @endif" name="text:{{ $lang->code }}" placeholder="@lang('backend.placeholders.enter.content')">
                                {!!  isset($product) ? $product->translate($lang->code)->text : old('text:'.$lang->code) ?? '' !!}
                            </textarea>`
                            @if ($errors->has("text:$lang->code"))
                                <div class="invalid-feedback">{{ $errors->first("text:$lang->code") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.price')
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ isset($product) ? $product->price : old('price') }}" placeholder="@lang('backend.placeholders.enter.price')" step=0.01>
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.status')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <span class="switch switch-md switch-icon">
                    <label>
                        <input type="checkbox" class="bool" name="status" value="{{ isset($product) ? $product->status : old('status') }}"  {{ (isset($product) ? old('status',$product->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.images')
            @if(!$edit)
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image[]" accept="image/*" multiple>
                    <label class="custom-file-label">
                        @lang('backend.placeholders.choose.images')
                    </label>
                </div>
                @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
