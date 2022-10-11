<script>
    let columnsArr = {!! json_encode($columns) !!},
        lang = '{{ config('app.locale') }}',
        pageLength = {{ isset($pageLength) ? json_encode($pageLength) : 10 }},
        columns = columnsArr.map(item => {
            return {
                data: item,
                name: item,
            };
        });

    lang === 'az'
        ? langUrl='{{ asset('/backend/js/datatables/langs/az_az.json') }}'
        : langUrl='';


    let   table = $('#datatable').DataTable(
        {
            oLanguage:
                {
                    url: langUrl
                },
            ajax:
                {
                    url:  '{{ $route }}',
                    type: 'GET'
                },
            serverSide: true,
            processing: true,
            searching: true,
            scrollCollapse: true,
            aaSorting : [[0, false]],
            order: [[0, "desc"]],
            buttons: [
                'colvis',
                {
                    extend: 'csv',
                    charset: 'UTF-8',
                    fieldSeparator: ';',
                    bom: true,

                },
                {
                    extend: 'excel',
                    charset: 'UTF-8',
                    bom: true,
                    exportOptions: {
                        columns: [ 0, 2, 3,]
                    }
                },
                {
                    extend: 'pdf',
                    charset: 'UTF-8',
                    bom: true,
                    exportOptions: {
                        columns: [ 0, 2, 3,]
                    }
                },
                {
                    extend: 'print',
                    charset: 'UTF-8',
                    bom: true,
                    exportOptions: {
                        stripHtml: false,
                        columns: [ 0, 2, 3,]
                    }
                },

            ],
            "pageLength":pageLength,
            "lengthMenu": [10, 50, 100, 150, 200],
            dom: "lfrttipB",
            columns,
            columnDefs:
                [
                    {
                        'orderable': false
                    }
                ],
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
                            if (result.status == 1)
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
