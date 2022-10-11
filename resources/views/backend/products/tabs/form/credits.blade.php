<div class="tab-pane fade @if($loop->first) active show @endif" id="credits" role="tabpanel" aria-labelledby="tab-credits">
    <div class="form-group row">
        <label for="credits" class="col-3 col-form-label text-right">
            @lang('backend.labels.credits')
            <span class="text-danger">*</span>
       </label>

        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <select id="credits" class="select2 form-control @error('credits') is-invalid @enderror" name="credits[]" multiple="multiple">
                    @foreach ($credits as $credit)
                        <option value="{{ $credit->id }}"
                            {{  in_array($credit->id, isset($product) ? optional($product->credits)->pluck('id')->toArray() : old('credits') ??  []) ? 'selected' : '' }}>
                            {{ $credit->month }}
                        </option>
                    @endforeach
                </select>
                @error('credits')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div>
