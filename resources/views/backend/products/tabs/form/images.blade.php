<div class="tab-pane fade @if($loop->first) active show @endif" id="images" role="tabpanel" aria-labelledby="tab-images">
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
        <label for="image_alt:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.image_alt') ({{ strtoupper($lang->code) }})
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input id="image_alt:{{ $lang->code }}" type="text" class="form-control @if($errors->has("image_alt:$lang->code")) is-invalid @endif" name="image_alt:{{ $lang->code }}" value="{{ isset($product) ? $product->translate($lang->code)->image_alt : old('image_alt:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.image_alt')">
                @if ($errors->has("image_alt:$lang->code"))
                    <div class="invalid-feedback">{{ $errors->first("image_alt:$lang->code") }}</div>
                @endif
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
