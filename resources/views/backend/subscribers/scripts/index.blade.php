<script>
    var table = $('#datatable').DataTable(
    {
        oLanguage:
        {
            sProcessing: '{{ trans("backend.datatables.loading") }}',
            sSearch:     '{{ trans("backend.datatables.search") }}'
        },
        ajax:
        {
            url:  '{{ route("backend.subscribers.index") }}',
            type: 'GET'
        },
        serverSide: true,
        processing: true,
        columns:
        [
            {data: 'id',      name: 'id'},
            {data: 'email',    name: 'email'},
            {data: 'created_at',    name: 'created_at'},
            {data: 'actions', name: 'actions'}
        ],
        "order": [ 0, "desc" ],
        language:
        {
            'emptyTable': '{{ trans("backend.datatables.empty") }}'
        }
    });

    $(document).on('click', '.btn-delete', function(e)
    {
        e.preventDefault();

        {!! confirm() !!}.then((result) =>
        {
            if (result.isConfirmed)
            {
                var url  = $(this).prop('href');
                var type = 'POST';
                var data = {_method: 'DELETE', _token: '{{ csrf_token() }}'};

                $.ajax(
                {
                    url:  url,
                    type: type,
                    data: data,
                    success: function (result)
                    {
                        if (result.status == 2)
                        {
                            {!! notify('warning', trans('backend.messages.warning.role')) !!}
                        }

                        else if (result.status == 1)
                        {
                            {!! notify('success', trans('backend.messages.success.delete')) !!}
                            table.row($(this).parents('tr')).remove().draw();
                        }

                        else
                        {
                            {!! notify('error', trans('backend.messages.error.delete')) !!}
                        }
                    }
                });
            }
        });
    });
</script>
