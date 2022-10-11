<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $installment_card->id }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.name')</td>
                    <td class="table-center">{{ $installment_card->transname }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.image')</td>
                    <td class="table-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#imageModal">
                            @lang('backend.buttons.view')
                        </button>
                        @include('backend.includes.modal.image', ['model' => $installment_card,'image_path'=>$installment_card->getFirstMediaUrl('installment_card_icon','thumb-large') ?: asset('backend/img/noimage.jpg')])
                    </td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                    <td class="table-center">{!! badge($installment_card->status) !!}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.created_at')
                    </td>
                    <td class="table-center">{{ $installment_card->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.updated_at')
                    </td>
                    <td class="table-center">{{ $installment_card->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>


            </tbody>
        </table>
    </div>
</div>
