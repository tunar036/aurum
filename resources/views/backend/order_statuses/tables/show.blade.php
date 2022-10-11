<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $order_status->id }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.name')
                </td>
                <td class="table-center">{{ $order_status->transname }}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($order_status->status) !!}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $order_status->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $order_status->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
