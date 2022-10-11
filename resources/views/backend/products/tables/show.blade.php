<div class="card-body col-md-10 offset-md-1 text-center mt-2">
    <div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $product->id }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.name')
                </td>
                <td class="table-center">{{ $product->name }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.slug')
                </td>
                <td class="table-center">{{ $product->slug }}</td>
            </tr>


            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.category')
                </td>
                <td class="table-center">{{ $product->category->transname ?? '' }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.price')
                </td>
                <td class="table-center">{{ number_format($product->price,2) }} <span class="azn">M</span></td>
            </tr>

{{--            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.discount_number')
                </td>
                <td class="table-center">{{ $product->discount_number }} <span class="azn">M</span></td>
            </tr>--}}

{{--            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.discount_price')
                </td>
                <td class="table-center">{{ number_format(($product->discount_price),2) ?: '---' }} <span class="azn">M</span></td>
            </tr>--}}

{{--            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.quantity_type')
                </td>
                <td class="table-center">
                    @switch($product->quantity_type)
                        @case(1)
                        @lang('backend.quantity_types.in_stock')
                        @break
                        @case(2)
                        @lang('backend.quantity_types.not_in_stock')
                        @break
                        @case(3)
                        @lang('backend.quantity_types.count')
                        @break
                    @endswitch
                </td>
            </tr>--}}
{{--            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.quantity')
                </td>
                <td class="table-center">
                    {{ $product->quantity_type == 3 ? $product->quantity : '---' }}
                </td>
            </tr>--}}




            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.status')
                </td>
                <td class="table-center">{!! badge($product->status) !!}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $product->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $product->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            </tbody>
        </table>

        <h2 class="mt-2 text-center">SEO</h2>
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.title')
                </td>
                <td class="table-center">{{ $product->transtitle ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.keywords')
                </td>
                <td class="table-center">{{ $product->transkeywords ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.description')
                </td>
                <td class="table-center">{{ $product->transdescription ?? ''  }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    @include('backend.products.gallery.media',[
    'model' => $product,
    'name'  => 'products',
    'media_collection_name'  => 'product_images',
    'isDeleted' => false,
    'isCovered' => false,
])
</div>
