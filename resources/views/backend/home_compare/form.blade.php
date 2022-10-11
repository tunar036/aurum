@extends('layouts.backend.master')
@section('title', trans('backend.titles.home-compares'))
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
                    @include('backend.includes.form.header', ['page' => 'home-compares'])
                    <form action="{{ $edit === false ? route('backend.home-compares.store') :  route('backend.home-compares.update', ['home_compare' => $home_compare->id]) }}" method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    @if(count($errors) > 0)
                                        <div class="p-1">
                                            @foreach($errors->all() as $error)
                                                <div class="alert alert-warning alert-danger fade show" role="alert">
                                                    Müqayisə üçün məhsullar mütləq seçilməlidir!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span class="text-white" aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

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
                                              <input  type="checkbox" class="bool" name="status" value="{{ $home_compare->status ?? old('status') }}"
                                                      @if(isset($home_compare) ? $home_compare->status : old('status') == 1 ) checked @else checked @endif>
                                              <span></span>
                                          </label>
                                      </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"  v-if="products.length > 0">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover table-striped table-sm text-center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Şəkil</th>
                                            <th scope="col">Adı</th>
                                            <th scope="col">Kateqoriyası</th>
                                            <th scope="col">Brendi</th>
                                            <th scope="col">Qiyməti</th>
                                            <th scope="col">Endirimli qiyməti</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="product in products" @key="product.id">
                                            <th>@{{ product.id }}</th>
                                            <td><img width="25" :src="product.image" :alt="product.name"></td>
                                            <td>@{{ product.name }}</td>
                                            <td>@{{ product.category_name }}</td>
                                            <td>@{{ product.brand_name }}</td>
                                            <td>@{{ product.price }} <span class="azn"> M</span></td>
                                            <td>@{{ product.discount_price }} <span v-if="product.discount_price" class="azn"> M</span></td>
                                            <td>
                                                <a v-if="selectedCounts < 2" ref="ref" href="javascript:void(0)" @click.preventDefault="addSelectedProduct(product)" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Əlavə et</a>
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
                            <div class="row"  v-if="selectedProducts.length > 0">
                            <h4 class="text-center py-2">Ana səhifə müqayisə bölməsi üçün seçilmiş məhsullar</h4>
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
                                            <th scope="col">Endirimli qiyməti</th>
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
                                            <td>@{{ product.discount_price }} <span v-if="product.discount_price" class="azn"> M</span></td>
                                            <td>
                                                <a href="javascript:void(0)" @click.preventDefault="removeSelectedProduct(product)" class="btn btn-danger btn-sm">Sil <i class="fa fa-trash"></i></a>
                                                <a :href="product.slug" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ətraflı</a>
                                            </td>
                                            <input type="hidden" name="products[]" :value="product.id">
                                            <input type="hidden" name="categories[]" :value="product.category_id">
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
                        selectedProducts:  [...JSON.parse('{!!  json_encode($products ?? [])  !!}')],
                        selectedCounts : 0,
                    }
                },
                mounted() {
                    this.lastID = this.selectedProducts.length;
                    this.selectedCounts = this.selectedProducts.length;
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
                        fetch('{{ route('backend.home-compares.getProducts') }}?category_id=' + this.form.category_id + '&brand_id=' + this.form.brand_id + '&name=' + this.form.name)
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
                            fetch('{{ route('backend.home-compares.getProducts') }}?category_id=' + this.form.category_id + '&brand_id=' + this.form.brand_id + '&name=' + this.form.name + '&lastID=' + this.lastID)
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
                        this.selectedCounts = this.selectedProducts.length;
                    },
                    removeSelectedProduct(product) {
                        this.selectedProducts.splice(this.selectedProducts.indexOf(product), 1);
                        this.selectedCounts = this.selectedProducts.length;
                    },
                }
            }).mount('#app')
        </script>

 @endsection
