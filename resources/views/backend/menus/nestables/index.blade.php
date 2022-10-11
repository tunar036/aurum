<div class="card-body">
    <menu id="nestable-menu" class="mt-0 mb-5">
        <button type="button" data-action="expand-all" class="btn btn-sm btn-success mr-2">
            <i class="la la-plus"></i> @lang('backend.buttons.expand')
        </button>
        <button type="button" data-action="collapse-all" class="btn btn-sm btn-danger">
            <i class="la la-minus"></i> @lang('backend.buttons.collapse')
        </button>
    </menu>
    @if ($menus)
        <div class="dd mt-5" id="nestable">{!! $menus !!}</div>
    @endif
</div>
