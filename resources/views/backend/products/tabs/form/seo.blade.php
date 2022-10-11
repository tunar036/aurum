<div class="tab-pane fade @if($loop->first) active show @endif" id="seo" role="tabpanel" aria-labelledby="tab-seo">
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <ul class="nav nav-light-primary nav-pills" role="tablist">
                @foreach ($langs as $lang)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif" id="tab-seo-{{ $lang->code }}" data-toggle="tab" href="#seo-{{ $lang->code }}">
                            <span class="nav-text">{{ $lang->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="tab-content">
        @foreach ($langs as $lang)
            <div class="tab-pane fade @if($loop->first) active show @endif" id="seo-{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-seo-{{ $lang->code }}">
                <div class="form-group row">
                    <label for="title:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                        @lang('backend.labels.meta_title') ({{ strtoupper($lang->code) }})
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input id="title:{{ $lang->code }}" type="text" class="form-control @if($errors->has("title:$lang->code")) is-invalid @endif" name="title:{{ $lang->code }}" value="{{ isset($product) ? $product->translate($lang->code)->title : old('title:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.meta_title')">
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
                            <input id="keywords:{{ $lang->code }}" type="text" class="form-control tagify-{{ $lang->code  }} @if($errors->has("keywords:$lang->code")) is-invalid @endif" name="keywords:{{ $lang->code }}" value="{{ isset($product) ? $product->translate($lang->code)->keywords : old('keywords:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.meta_keywords')">
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
                            <input id="description:{{ $lang->code }}" type="text" class="form-control @if($errors->has("description:$lang->code")) is-invalid @endif"  name="description:{{ $lang->code }}" value="{{ isset($product) ? $product->translate($lang->code)->description : old('description:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.meta_description')">
                            @if ($errors->has("description:$lang->code"))
                                <div class="invalid-feedback">{{ $errors->first("description:$lang->code") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
