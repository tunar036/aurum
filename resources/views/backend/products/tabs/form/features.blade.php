<div class="tab-pane fade @if($loop->first) active show @endif" id="features" role="tabpanel" aria-labelledby="tab-features">
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
{{--    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.discount_number')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('discount_price') is-invalid @enderror" name="discount_number" value="{{ isset($product) ? $product->discount_number  : old('discount_number') }}" placeholder="@lang('backend.placeholders.enter.discount_number')" step=0.01>
                @error('discount_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>--}}
{{--
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.weight')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ isset($product) ? $product->weight : old('weight') }}" placeholder="@lang('backend.placeholders.enter.weight')" step=0.01>
                @error('weight')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
--}}
{{--
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.length')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ isset($product) ? $product->length : old('length') }}" placeholder="@lang('backend.placeholders.enter.length')" step=0.01>
                @error('length')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
--}}
{{--
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.height')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ isset($product) ? $product->height : old('height') }}" placeholder="@lang('backend.placeholders.enter.height')" step=0.01>
                @error('height')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
--}}
{{--
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.width')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ isset($product) ? $product->width : old('width') }}" placeholder="@lang('backend.placeholders.enter.width')" step=0.01>
                @error('width')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
--}}
{{--
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.quantity_type')
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <select class="form-control @error('quantity_type') is-invalid @enderror" name="quantity_type">
                    <option value="">@lang('backend.placeholders.select.quantity_type')</option>
                    <option value="1" @if( isset($product) ? $product->quantity_type : old('quantity_type') == 1) selected @endif>
                        @lang('backend.quantity_types.in_stock')
                    </option>
                    <option value="2" @if(isset($product) ? $product->quantity_type : old('quantity_type') == 2) selected @endif>
                        @lang('backend.quantity_types.not_in_stock')
                    </option>
                    <option value="3" @if(isset($product) ? $product->quantity_type : old('quantity_type') == 3) selected @endif>
                        @lang('backend.quantity_types.count')
                    </option>
                </select>
                @error('quantity_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
--}}
{{--
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.quantity')
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ isset($product) ? $product->quantity : old('quantity') }}" placeholder="@lang('backend.placeholders.enter.quantity')">
                @error('quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
--}}
{{--
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.points')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('points') is-invalid @enderror" name="points" value="{{ isset($product) ? $product->points : old('points') }}" placeholder="@lang('backend.placeholders.enter.points')">
                @error('points')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
--}}
{{--
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.minimum')
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('minimum') is-invalid @enderror" name="minimum" value="{{ isset($product) ? $product->minimum : old('minimum') ?? 1 }}" placeholder="@lang('backend.placeholders.enter.minimum')">
                @error('minimum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
                        <input type="checkbox" class="bool" name="status" value="{{ isset($product) ? $product->status : old('status') }}"  {{ (isset($product) ? old('status',$product->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>

</div>
