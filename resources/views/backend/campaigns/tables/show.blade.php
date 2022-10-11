<div class="card-body col-md-10 offset-md-1 text-center mt-2">
<div class="table-responsive">
    <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $campaign->id }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.name')
                </td>
                <td class="table-center">{{ $campaign->transname }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.slug')</td>
                <td class="table-center">{{ $campaign->transslug }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.content')</td>
                <td class="table-center">{!! $campaign->transtext!!}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.notes')</td>
                <td class="table-center">{!! $campaign->transnote!!}</td>
            </tr>

            </tbody>
        </table>
    <h1 class="mt-2 text-center">SEO</h1>
    <table class="table table-hover table-rounded border gy-7 gs-7">
        <tbody>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
            <td class="table-row-title w-25">
                @lang('backend.labels.title')
            </td>
            <td class="table-center">{{ $campaign->transtitle ?? ''  }}</td>
        </tr>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
            <td class="table-row-title w-25">
                @lang('backend.labels.keywords')
            </td>
            <td class="table-center">{{ $campaign->transkeywords ?? ''  }}</td>
        </tr>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
            <td class="table-row-title w-25">
                @lang('backend.labels.description')
            </td>
            <td class="table-center">{{ $campaign->transdescription ?? ''  }}</td>
        </tr>
        </tbody>
    </table>
    </div>
</div>
