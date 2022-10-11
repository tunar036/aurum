<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $page->id }}</td>
                </tr>

                    <tr class="bg-gray-100">
                        <td class="table-row-title w-25">@lang('backend.labels.name')</td>
                        <td class="table-center">{{ $page->transname }}</td>
                    </tr>

                     <tr class="bg-gray-100">
                        <td class="table-row-title w-25">@lang('backend.labels.page_title')</td>
                        <td class="table-center">{{ $page->transpagetitle }}</td>
                    </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                    <td class="table-center">{!! badge($page->status) !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
