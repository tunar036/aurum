<div class="card-body col-md-10 offset-md-1 text-center mt-2">
    <div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $service->id }}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.name')</td>
                    <td class="table-center">{{ $service->transname }}</td>
                </tr>


                @if ($service->getFirstMedia('service_icon'))
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <td class="table-row-title w-25">@lang('backend.labels.logo')</td>
                        <td class="table-center">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#imageModal">
                                @lang('backend.buttons.view')
                            </button>
                            @include('backend.includes.modal.image', [
                                'model' => $service,
                                'image_path' =>
                                    $service->getFirstMediaUrl('service_icon') ?:
                                    asset('backend/img/noimage.jpg'),
                            ])
                        </td>
                    </tr>
                @endif

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                    <td class="table-center">{!! badge($service->status) !!}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.created_at')
                    </td>
                    <td class="table-center">{{ $service->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.updated_at')
                    </td>
                    <td class="table-center">{{ $service->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.description')
                    </td>
                    <td class="table-center">{{ $service->transdescription ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
