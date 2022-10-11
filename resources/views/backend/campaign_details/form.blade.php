@extends('layouts.backend.master')
@section('title', trans('backend.titles.campaign_details'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">
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
                    @include('backend.includes.form.header', ['page' => 'campaign_details'])
                    <form
                        action="{{ $edit === false ? route('backend.campaign_details.store') : route('backend.campaign_details.update', ['campaign_detail' => $campaign_detail->id])  }}"
                        method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    @if ($errors->has("products"))
                                        <div class="p-1">
                                                <div class="alert alert-warning alert-danger fade show" role="alert">
                                                    Kampaniya üçün məhsullar mütləq seçilməlidir!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span class="text-white" aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="campaign_id" class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    Uyğun kampanyanı seçin
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select name="campaign_id" class="select2 form-control" id="campaign_id">
                                        @foreach($campaigns as $campaign)
                                            <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="started_at"
                                       class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    @lang('backend.labels.started_at')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-here" id="started_at"
                                               name="started_at" data-timepicker="true" data-position="right bottom"
                                               value="{{ $edit ? $campaign_detail['started_at']->format('d.m.Y H:i:s') : now()->format('d.m.Y H:i:s') }}"
                                               maxlength="11" data-maxlength="11">
                                        @if ($errors->has("started_at"))
                                            <div class="invalid-feedback">{{ $errors->first("started_at") }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="ended_at"
                                       class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    @lang('backend.labels.ended_at')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-here" id="ended_at"
                                               name="ended_at" data-timepicker="true" data-position="right bottom"
                                               value="{{ $edit ? $campaign_detail['ended_at']->format('d.m.Y H:i:s') : now()->addDays(1)->format('d.m.Y H:i:s') }}"
                                               maxlength="11" data-maxlength="11">
                                        @if ($errors->has("ended_at"))
                                            <div class="invalid-feedback">{{ $errors->first("ended_at") }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="campaign_type" class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    Kampaniya tipini seçin
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select v-model="form.campaign_type" class="form-control" id="campaign_type" name="campaign_type_id">
                                        <option selected value="">Seçin</option>
                                        @foreach($campaign_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->transname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div v-if="form.campaign_type == 1" class="form-group row">
                                <label for="taksit_card_type" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Kartın tipi
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="taksit_card_type" type="text"
                                               class="form-control @error('taksit_card_type') is-invalid @enderror"
                                               name="taksit_card_type"
                                               value="{{ isset($campaign_detail) ? $campaign_detail->taksit_card_type  : old('taksit_card_type') }}">
                                        @error('taksit_card_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount_type" class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    Kompaniya endirimi
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select v-model="form.discount_type" class="form-control" id="discount_type">
                                        <option selected value="percent">Faiz ilə</option>
                                        <option value="price">Qiymət ilə</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" v-if="form.discount_type === 'percent'">
                                <label for="campaign_discount_percent" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Kompaniyanın endirim faizi
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="campaign_discount_percent" type="number"
                                               class="form-control @error('campaign_discount_percent') is-invalid @enderror"
                                               name="campaign_discount_percent"
                                               min="0" max="1" step="0.01"
                                               value="{{ isset($campaign_detail) ? $campaign_detail->campaign_discount_percent  : old('campaign_discount_percent') }}">
                                        @error('campaign_discount_percent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" v-else>
                                <label for="campaign_discount_price" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Kompaniyanın endirim qiyməti
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="campaign_discount_price" type="number"
                                               class="form-control @error('campaign_discount_price') is-invalid @enderror"
                                               name="campaign_discount_price"
                                               value="{{ isset($campaign_detail) ? $campaign_detail->campaign_discount_price  : old('campaign_discount_price') }}">
                                        @error('campaign_discount_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="choose_discount_type" class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    Kompaniyaya aiddir
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select v-model="form.choose_discount_type" class="form-control" id="choose_discount_type">
                                        <option selected value="1">Kateqoriyaya görə</option>
                                        <option value="2">Brendə görə</option>
                                        <option value="3">Brend və Kateqoriyaya görə</option>
                                        <option value="4">Məhsula görə</option>
                                    </select>
                                </div>
                            </div>



                            <div v-if="form.choose_discount_type == 1 || form.choose_discount_type == 3" class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12 col-form-label" for="categories">
                                    @lang('backend.labels.category')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select id="categories"
                                            class="select2 form-control @error('categories') is-invalid @enderror"
                                            name="categories[]" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{  in_array($category->id, isset($campaign_detail) ? optional($campaign_detail->categories)->pluck('id')->toArray() : old('categories') ??  []) ? 'selected' : '' }}>
                                                {{ $category->transname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div v-if="form.choose_discount_type == 2 || form.choose_discount_type == 3" class="form-group row">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12 col-form-label" for="brands">
                                        @lang('backend.labels.brand')
                                        <span class="text-danger">*</span>
                                    </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select id="brands"
                                            class="select2 form-control @error('brands') is-invalid @enderror"
                                            name="brands[]" v-model="form.brands" multiple>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{  in_array($brand->id, isset($campaign_detail) ? optional($campaign_detail->brands)->pluck('id')->toArray() : old('brand') ??  []) ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brands')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                            <div v-if="form.choose_discount_type == 4" class="form-group row">
                                <div class="col-md-6 mx-auto">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#productModal"><i class="fa fa-plus"></i> Məhsul seç </button>
                                </div>
                            </div>

                            <hr>
                            <div class="row"  v-if="selectedProducts.length > 0">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover tbale-striped table-sm text-center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Şəkil</th>
                                            <th scope="col">Adı</th>
                                            <th scope="col">Kateqoriyası</th>
                                            <th scope="col">Brendi</th>
                                            <th scope="col">Miqdarı</th>
                                            <th scope="col">Qiyməti</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="product in selectedProducts" @key="product.id">
                                            <th>@{{ product.id }}</th>
                                            <td><img width="25" :src="product.image" :alt="product.name"></td>
                                            <td>@{{ product.name }}</td>
                                            <td>@{{ product.category_name }}</td>
                                            <td>@{{ product.brand_name }}</td>
                                            <td>@{{ product.quantity }}</td>
                                            <td>@{{ product.price }} <span class="azn"> M</span></td>
                                            <td>
                                                <a href="javascript:void(0)" @click.preventDefault="removeSelectedProduct(product)" class="btn btn-danger btn-sm">Sil <i class="fa fa-trash"></i></a>
                                                <a :href="product.slug" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ətraflı</a>
                                            </td>
                                            <input type="hidden" name="products[]" :value="product.id">
                                            <input type="hidden" name="prices[]" :value="product.price">
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                        @include('backend.includes.form.footer')
                    </form>

                    @include('backend.campaign_details.modal.products')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('/backend/js/datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.fn.datepicker.language['az'] = {
                days: ['Bazar', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                daysMin: ['Bz', 'Be', 'Ça', 'Çş', 'Ca', 'Cm', 'Şb'],
                months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                today: 'Today',
                clear: 'Clear',
                dateFormat: 'mm/dd/yyyy',
                timeFormat: 'hh:ii aa',
                firstDay: 0
            };

            let select2 = $('.select2');
            select2.select2({
                minimumResultsForSearch: 20,
                theme: 'bootstrap4',
                placeholder: 'Axtardığınız'
            });
        });


    </script>

    <script src="{{ asset('/backend/js/vue-3.js') }}"></script>

    <script>
        Vue.createApp({
            data() {
                return {
                    form: {
                        name: '',
                        category_id: "",
                        brand_id: "",
                        campaign_type: "{{ $edit && $campaign_detail->campaign_type_id ?? '' }}",
                        choose_discount_type: 1,
                        discount_type:'percent',
                    },
                    products: [],
                    lastID: 0,
                    selectedProducts:  [...JSON.parse('{!!  json_encode($products ?? [])  !!}')],

                }
            },
            updated() {
                let select2 = $('.select2');
                select2.select2({
                    minimumResultsForSearch: 20,
                    theme: 'bootstrap4',
                    placeholder: 'Axtardığınız'
                });
            },
            methods: {
                getProducts() {
                    fetch('{{ route('backend.campaign_details.getProducts') }}?category_id=' + this.form.category_id + '&brand_id=' + this.form.brand_id + '&name=' + this.form.name)
                        .then(response => response.json())
                        .then(data => {
                            this.products = [];
                            this.products.push(...data.data);
                            this.lastID = data.lastID;
                        })
                        .catch(err => console.error(err));
                },

                moreLoading() {
                    if (this.lastID !== 0) {
                        fetch('{{ route('backend.campaign_details.getProducts') }}?category_id=' + this.form.category_id + '&brand_id=' + this.form.brand_id + '&name=' + this.form.name + '&lastID=' + this.lastID)
                            .then(response => response.json())
                            .then(data => {
                                this.lastID = data.lastID;
                                this.products.push(...data.data);
                            })
                            .catch(err => console.error(err));
                    }
                },

                addSelectedProduct(product) {
                    this.products = this.products.filter(item => item.id !== product.id);
                    this.selectedProducts.push({...product});

                },
                removeSelectedProduct(product) {
                    this.selectedProducts.splice(this.selectedProducts.indexOf(product), 1);
                },
            }
        }).mount('#app')
    </script>


@endsection
