<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $store->id }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.title')</td>
                <td class="table-center">{{ $store->title }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.district')</td>
                <td class="table-center">{{ $store->district->name ?? '' }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.address')</td>
                <td class="table-center">{{ $store->address ?? '' }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.latitude')</td>
                <td class="table-center">{{ $store->latitude ?? '' }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.longitude')</td>
                <td class="table-center">{{ $store->longitude ?? '' }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($store->status) !!}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $store->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $store->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
