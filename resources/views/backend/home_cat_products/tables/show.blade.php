<div class="card-body col-md-10 offset-md-1 text-center mt-2">
<div class="table-responsive">
    <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $home_cat_product->id }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.category')</td>
                <td class="table-center">
                    <a href="{{ route('backend.categories.show', $home_cat_product->category->id) }}" target="_blank">
                        {{ $home_cat_product->category->transname ?? ''  }}
                    </a>
                </td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">Ana kateqoriyası</td>
                <td class="table-center">
                    <a href="{{ route('backend.categories.show', $home_cat_product->category->parent->id) }}" target="_blank">
                        {{ $home_cat_product->category->parent->transname ?? ''  }}
                    </a>
                </td>
            </tr>


            @if($home_cat_product->getFirstMedia('home_cat_image'))
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.image')</td>
                    <td class="table-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#imageModal_2">
                            @lang('backend.buttons.view')
                        </button>
                        @include('backend.categories.modal.image', ['model' => $home_cat_product,'image_path'=>$home_cat_product->getFirstMediaUrl('home_cat_image') ?: asset('backend/img/noimage.jpg')])
                    </td>
                </tr>
            @endif


            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.order')</td>
                <td class="table-center">{{ $home_cat_product->order }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($home_cat_product->status) !!}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $home_cat_product->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $home_cat_product->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
