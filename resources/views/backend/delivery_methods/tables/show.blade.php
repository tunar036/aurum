<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $delivery_method->id }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.title')</td>
                <td class="table-center">{{ $delivery_method->transname }}</td>
            </tr>



{{--            <tr class="bg-gray-100">--}}
{{--                <td class="table-row-title w-25">@lang('backend.labels.price')</td>--}}
{{--                <td class="table-center">{{ $delivery_method->price ?? 0 }} &#8380; </td>--}}
{{--            </tr>--}}

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($delivery_method->status) !!}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $delivery_method->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $delivery_method->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
