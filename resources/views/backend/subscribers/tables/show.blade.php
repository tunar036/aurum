<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $subscriber->id }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">@lang('backend.labels.email')</td>
                <td class="table-center">{{ $subscriber->email }}</td>
            </tr>
            <tr class="bg-gray-100">
                <td class="table-row-title w-25">Abunə olma vaxtı</td>
                <td class="table-center">{{ $subscriber->created_at->format('Y-m-d H:s:i') }}</td>
            </tbody>
        </table>
    </div>
</div>
