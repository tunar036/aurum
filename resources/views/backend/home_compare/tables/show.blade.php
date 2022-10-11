<div class="card-body col-md-10 offset-md-1 text-center mt-2">
<div class="table-responsive">
    <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $home_compare->id }}</td>
            </tr>
            @foreach($home_compare->products as $product)

            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.product') {{ $loop->iteration }}</td>
                <td class="table-center">{{ $product->name  }}</td>
            </tr>
            <tr>
                <td>Link</td>
                <td><a href="{{ route('backend.products.show', $product->id) }}" target="_blank" class="btn btn-sm btn-primary">Ətraflı</a></td>
            </tr>

            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.image')</td>
                <td class="table-center">
                    <img width="26" src="{{ $product->getFirstMediaUrl('product_images','thumb-small') ? $product->getFirstMediaUrl('product_images','thumb-small') : asset('backend/img/noimage.jpg') }}" alt="{{ $product->name }}">
                </td>
            </tr>
            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.category') </td>
                <td class="table-center">{{ $product->category->transname  }}</td>
            </tr>

            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.brand') </td>
                <td class="table-center">{{ $product->brand->name  }}</td>
            </tr>
            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.price')</td>
                <td class="table-center"> {{ number_format($product->price,2) ?? "-" }} <span class="azn">M</span> </td>
            </tr>
            @if(!is_null($home_compare->discount_price))
            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.discount_price')</td>
                <td class="table-center"> {{ number_format($product->discount_price,2) ?? "-" }} <span class="azn">M</span> </td>
            </tr>
            @endif

            @endforeach
            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.created_at')</td>
                <td class="table-center">{{ $home_compare->created_at ?? "-" }} </td>
            </tr>
            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($home_compare->status) !!}</td>
            </tr>
            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $home_compare->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="bgfw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $home_compare->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
