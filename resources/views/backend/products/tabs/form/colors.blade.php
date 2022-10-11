<div class="tab-pane fade @if($loop->first) active show @endif" id="colors" role="tabpanel"
     aria-labelledby="tab-colors">
    <div id="colorsApp">
        <div class="row" v-for="(item, index) in items" @key="index">
          <div class="col-md-2">
              <div class="form-group">
                  <label class="text-left" for="color">
                      @lang('backend.labels.color')
                  </label>
                  <select id="color" class="form-control" v-model="item.color_id">
                      <option selected value="" disabled>Seçin</option>
                      @foreach ($colors as $color)
                          <option value="{{ $color->id }}">
                              {{ $color->transname }}
                          </option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label for="price">
                      @lang('backend.labels.price')
                  </label>
                  <input id="price" type="text" class="form-control" v-model="item.price">
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label for="stock">
                      @lang('backend.labels.stock')
                  </label>
                  <select id="stock" class="form-control" v-model="item.stock">
                      <option value="1" selected>Stokda var</option>
                      <option value="0">Stokda yoxdur</option>
                  </select>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label for="sku">
                     SKU
                  </label>
                  <input id="sku" type="text" class="form-control" v-model="item.sku">
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for=""> </label>
                  <div class="col-md-12">
                          <button class="btn btn-sm btn-primary" type="button" @click="addItem"  v-if="items.length - 1 <= index">
                              <i class="fa fa-plus"></i>
                          </button>
                          <button class="btn btn-sm btn-danger" v-on:click="removeItem(index);" v-if="(items.length - 1 >= index) && (items.length -1 != index)" type="button">
                              <i class="fa fa-minus"></i>
                          </button>
                  </div>
                  <input type="hidden" name="colors[color_id][]" :value="item.color_id">
                  <input type="hidden" name="colors[price][]" :value="item.price">
                  <input type="hidden" name="colors[stock][]" :value="item.stock">
                  <input type="hidden" name="colors[sku][]" :value="item.sku">
              </div>
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
                    items: [],
                    colors :  [...JSON.parse('{!!  json_encode($productColors ?? [])  !!}')],
                }
            },
            mounted() {
              this.coloritems;
            },
            computed: {
                coloritems() {
                    this.colors.length > 0 ? this.items = this.colors : this.items = [{  color_id: "",  price: "", stock: "1" }];
                }
            },
            methods: {
                addItem() {
                    this.items.push({
                        color_id: "",
                        price: "",
                        stock: "1",
                        sku: ''
                    })
                },
                removeItem(index) {
                    this.items.splice(index, 1);
                },
            }

        }).mount('#colorsApp')
    </script>
@endpush
