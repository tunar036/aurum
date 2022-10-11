<div class="card-body col-md-10 offset-md-1 text-center mt-2">
    <div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $menu->id }}</td>
            </tr>
            <tr class="table table-hover table-rounded table-striped border gy-7 gs-7">
                <td class="table-row-title w-25">
                    @lang('backend.labels.name')
                </td>
                <td class="table-center">{{ $menu->transname }}</td>
            </tr>
            <tr class="table table-hover table-rounded table-striped border gy-7 gs-7">
                <td class="table-row-title w-25">@lang('backend.labels.slug')</td>
                <td class="table-center">{{ $menu->transslug }}</td>
            </tr>

            <tr class="table table-hover table-rounded table-striped border gy-7 gs-7">
                <td class="table-row-title w-25">Mövqeyi</td>
                <td class="table-center">{{ implode(', ',$menu->positions) }}</td>
            </tr>
            <tr class="table table-hover table-rounded table-striped border gy-7 gs-7">
                <td class="table-row-title w-25">@lang('backend.labels.parent')</td>
                <td class="table-center">{{ $menu->parent ? $menu->parent->translate($locale)->name : trans('backend.mixins.no_parent') }}</td>
            </tr>
            <tr class="table table-hover table-rounded table-striped border gy-7 gs-7">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($menu->status) !!}</td>
            </tr>
            <tr>
                <td>Link</td>
                <td><a href="{{ $menu->url }}" target="_blank" class="btn btn-sm btn-primary">Keçid et</a></td>
            </tr>
            <tr class="table table-hover table-rounded table-striped border gy-7 gs-7">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $menu->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="table table-hover table-rounded table-striped border gy-7 gs-7">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $menu->updated_at->format('d-m-Y H:i:s') }}</td>
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
                <td class="table-center">{{ $menu->transtitle ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.keywords')
                </td>
                <td class="table-center">{{ $menu->transkeywords ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.description')
                </td>
                <td class="table-center">{{ $menu->transdescription ?? ''  }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
