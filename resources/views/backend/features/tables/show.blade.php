<div class="card-body col-md-10 offset-md-1 text-center mt-2">
    <div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $feature->id }}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.name')</td>
                    <td class="table-center">{{ $feature->transname }}</td>
                </tr>


                @if ($feature->getFirstMedia('feature_icon'))
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <td class="table-row-title w-25">@lang('backend.labels.logo')</td>
                        <td class="table-center">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#imageModal">
                                @lang('backend.buttons.view')
                            </button>
                            @include('backend.includes.modal.image', [
                                'model' => $feature,
                                'image_path' =>
                                    $feature->getFirstMediaUrl('feature_icon') ?:
                                    asset('backend/img/noimage.jpg'),
                            ])
                        </td>
                    </tr>
                @endif

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                    <td class="table-center">{!! badge($feature->status) !!}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.created_at')
                    </td>
                    <td class="table-center">{{ $feature->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.updated_at')
                    </td>
                    <td class="table-center">{{ $feature->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.description')
                    </td>
                    <td class="table-center">{{ $feature->transdescription ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
