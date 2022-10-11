<script>
    var can_update = parseInt('{{ admin()->can("menus edit") }}');
    var can_delete = parseInt('{{ admin()->can("menus delete") }}');

    if (can_update)
    {
        $('#nestable').nestable(
        {
            group:    1,
            maxDepth: 3
        })
        .on('change',  function(e)
        {
            var list = e.length ? e : $(e.target);

            $.ajax(
                {
                    url:  '{{ route("backend.menus.refresh") }}',
                    type: 'POST',
                    data:
                        {
                            list:   list.nestable('serialize'),
                            _token: '{{ csrf_token() }}'
                        },
                    dataType: 'json',
                    success: function ()
                    {
                        {!! notify('success', 'Müvəfəqiyyətlə dəyişdirildi!') !!}
                    }
                });
        });
    }

    else
    {
        $('#nestable').nestable(
        {
            onDragStart: function()
            {
                return false;
            }
        });
    }

    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();

        {!! confirm() !!}.then((result) => {
            if (result.isConfirmed) {
                var url = $(this).prop('href');
                var type = 'POST';
                var data = {_method: 'DELETE', _token: '{{ csrf_token() }}'};

                $.ajax(
                    {
                        url: url,
                        type: type,
                        data: data,
                        success: function (result) {
                            if (result.status == 2) {
                                {!! notify('warning', trans('backend.messages.warning.role')) !!}
                            } else if (result.status == 1) {
                                {!! notify('success', trans('backend.messages.success.delete')) !!}
                                table.row($(this).parents('tr')).remove().draw();
                                location.reload();
                            } else {
                                {!! notify('error', trans('backend.messages.error.delete')) !!}
                            }
                        }
                    });
            }
        });
    });



</script>
