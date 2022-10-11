<div class="tab-pane fade @if($loop->first) active show @endif" id="categories" role="tabpanel" aria-labelledby="tab-categories">
    <div class="form-group row" id="catsApp">
        <label for="category_id" class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.category')
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <select id="category_id" @change="onChange($event)" v-model="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">@lang('backend.placeholders.select.category')</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->transname }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
@push('extrascripts')
    <script src="{{ asset('/backend/js/vue-3.js') }}"></script>

    <script>
        Vue.createApp({
            data() {
                return {
                    category_id: '{{  old('category_id',$product->category_id ?? '') }}',
                }
            },
            methods: {
                onChange(event) {
                    fetch('{{ route('backend.categories.getOptions') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json, text/plain, */*',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN':  '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({category_id: this.category_id})
                    }).then(res => res.json())
                        .then(res => $('#productOptions').html(res.html));

                }
            }

        }).mount('#catsApp')
    </script>
@endpush
