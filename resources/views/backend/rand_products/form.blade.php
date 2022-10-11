@extends('layouts.backend.master')
@section('title', trans('backend.titles.rand-products'))
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
                    <form action="{{ $edit === false ? route('backend.rand-products.store') :  route('backend.rand-products.update', ['rand_product' => $rand_product->id]) }}" method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            @error('product_id')
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <div class="p-1">
                                        <div class="alert alert-warning alert-danger fade show" role="alert">
                                            Həftənin endirimli məhsulu mütləq seçilməlidir!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="text-white" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @enderror



                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-left" for="category_id">
                                            @lang('backend.labels.category')
                                        </label>
                                        <select id="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror"
                                                name="category_id" v-model="form.category_id" @change="getProducts">
                                            <option selected value="" disabled>Seçin</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->transname }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="brand_id">
                                            @lang('backend.labels.brand')
                                        </label>
                                        <select id="brand_id"
                                                class="form-control @error('brand_id') is-invalid @enderror"
                                                name="brand_id" v-model="form.brand_id" @change="getProducts">
                                            <option selected value="" disabled>Seçin</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="brand_id">
                                            @lang('backend.labels.product')
                                        </label>
                                        <input v-model="form.name" @input.lazy="getProducts" type="text" class="form-control" placeholder="Məhsulun adını daxil edin">
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
                                              <input  type="checkbox" class="bool" name="status" value="{{ $rand_product->status ?? old('status') }}"
                                                      @if(isset($rand_product) ? $rand_product->status : old('status') == 1 ) checked @else checked @endif>
                                              <span></span>
                                          </label>
                                      </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif" id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group">
                                            <label for="title:{{ $lang->code }}" class="col-form-label">
                                                @lang('backend.labels.title') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                                    <input id="title:{{ $lang->code }}" type="text" class="form-control @if($errors->has("title:$lang->code")) is-invalid @endif" name="title:{{ $lang->code }}" value="{{ isset($rand_product) ? $rand_product->translate($lang->code)->title : old('title:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.title')">
                                                    @if ($errors->has("title:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("title:$lang->code") }}</div>
                                                    @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <div class="row">
                                <div class="col-md-12" v-if="products.length > 0">
                                    <table class="table table-bordered table-hover table-striped table-sm text-center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Şəkil</th>
                                            <th scope="col">Adı</th>
                                            <th scope="col">Kateqoriyası</th>
                                            <th scope="col">Brendi</th>
                                            <th scope="col">Qiyməti</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(product, index) in products" @key="product.id">
                                            <th>@{{ product?.id }}</th>
                                            <td><img width="25" :src="product.image" :alt="product.name"></td>
                                            <td>@{{ product?.name }}</td>
                                            <td>@{{ product?.category_name }}</td>
                                            <td>@{{ product?.brand_name }}</td>
                                            <td>@{{ product?.price }} <span class="azn"> M</span></td>
                                            <td>
                                                <a v-if="product.id !== selectedProduct.id" href="javascript:void(0)" @click.preventDefault="addSelectedProduct(product)" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Əlavə et</a>
                                                <a v-else href="javascript:void(0)" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Əlavə olundu</a>
                                                <a :href="product.slug" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ətraflı</a>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <a href="javascript:void(0)" @click.preventDefault="moreLoading" class="btn btn-warning">Daha çox</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row"  v-if="selectedProduct?.id !== undefined ">
                                <div class="col-md-12">
                                    <h4 class="text-center">Günün məhsulu</h4>
                                    <br>
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
                                        <tr>
                                            <th>@{{ selectedProduct?.id }}</th>
                                            <td><img width="25" :src="selectedProduct?.image" :alt="selectedProduct?.name"></td>
                                            <td>@{{ selectedProduct?.name }}</td>
                                            <td>@{{ selectedProduct?.category_name }}</td>
                                            <td>@{{ selectedProduct?.brand_name }}</td>
                                            <td>@{{ selectedProduct?.quantity }}</td>
                                            <td>@{{ selectedProduct?.price }} <span class="azn"> M</span></td>
                                            <td>
                                                <a href="javascript:void(0)" @click.preventDefault="removeSelectedProduct()" class="btn btn-danger btn-sm">Sil <i class="fa fa-trash"></i></a>
                                                <a :href="selectedProduct?.slug" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ətraflı</a>
                                            </td>
                                            <input type="hidden" name="product_id" :value="selectedProduct.id">
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @include('backend.includes.form.footer')
                    </form>

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
                minimumResultsForSearch: 3,
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
                    },
                    products: [],
                    lastID: 0,
                    selectedProduct: {...JSON.parse('{!!  json_encode($product ?? '')  !!}')}
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
                    fetch('{{ route('backend.rand-products.getProducts') }}?category_id=' + this.form.category_id + '&brand_id=' + this.form.brand_id + '&name=' + this.form.name)
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
                        fetch('{{ route('backend.rand-products.getProducts') }}?category_id=' + this.form.category_id + '&brand_id=' + this.form.brand_id + '&name=' + this.form.name + '&lastID=' + this.lastID)
                            .then(response => response.json())
                            .then(data => {
                                this.lastID = data.lastID;
                                this.products.push(...data.data);
                            })
                            .catch(err => console.error(err));
                    }
                },
                addSelectedProduct(product) {
                    this.selectedProduct = {...product};
                },
                removeSelectedProduct() {
                    this.selectedProduct = {};
                },
            }
        }).mount('#app')
    </script>

@endsection
