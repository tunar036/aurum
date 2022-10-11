<div class="card-body">
    <table class="table table-responsive table-separate table-head-custom table-checkable" id="datatable">
        <thead>
        <tr>
            <td colspan="1">
            </td>
            <td colspan="2">
                <label for="productname">@lang('backend.labels.name')</label>
                <input type="text" id="productname" class="form-control filter-input" name="productname" value="">
            </td>
            <td colspan="2">
                <label for="category_id">@lang('backend.labels.category')</label>
                <select id="category_id" class="form-control filter-select" name="category_id">
                    <option value="">Seçin</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->transname }}</option>
                    @endforeach
                </select>
            </td>
            <td colspan="2">
                <label for="status">Aktivlik</label>
                <select id="status" data-column="9" class="form-control filter-select" name="status">
                    <option value="">Seçin</option>
                    <option value="1">Aktiv</option>
                    <option value="0">Passiv</option>
                </select>
            </td>
        </tr>

        <tr>
            <th>@lang('backend.labels.id')</th>
            <th>@lang('backend.labels.image')</th>
            <th>@lang('backend.labels.name')</th>
            <th>@lang('backend.labels.category')</th>
            <th>@lang('backend.labels.brand')</th>
            <th>@lang('backend.labels.price')</th>
            <th>@lang('backend.labels.discount_price')</th>
            <th>@lang('backend.labels.product_status')</th>
            <th>@lang('backend.labels.status')</th>
            <th>@lang('backend.labels.actions')</th>
        </tr>
        </thead>
    </table>
</div>
