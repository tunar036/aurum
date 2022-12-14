@if($model->getMedia($media_collection_name)->count())
    @push('extrahead')
        <link rel="stylesheet" href="{{ asset('/backend/css/lightcase.min.css') }}">
        <style>
            .media_custom {
                display: block;
                text-align: center;
                position: relative;
                padding: 20px;
                background: #fff;
                border: 1px solid #e7e5ea;
                box-sizing: border-box;
                border-radius: 12px;
                margin-bottom: 30px;
            }
            .media_custom:hover {
                border-color: #3e4095;
                background-color: #e7e5ea;
                cursor: pointer;
            }
            .media_text {
                font-style: normal;
                color: #262626;
                height: 40px;
                overflow: hidden;
                font-size: 12px;
            }

            .date {
                font-style: normal;
                font-weight: 400;
                font-size: 12px;
                line-height: 28px;
                color: #808191;
                letter-spacing: -.36px;
                display: block;
            }
        </style>
    @endpush
    <div class="row">
        <h2 class="text-center w-100 mb-10">@lang('backend.labels.images')</h2>
        @foreach($model->getMedia($media_collection_name) as $image)
            <div class="col-lg-2 col-md-3">
                <div class="media media_custom">
                    <a class="gal-item showcase" data-rel="lightcase:myCollection:slideshow"  title="{{ $image['name'] }}" href="{{ $image->getUrl() }}">
                        <figure>
                            <img style="width:50px; height:50px" class="img-fluid" alt="{{ $image['name'] }}"
                                 src="{{ $image->getUrl() }}">
                        </figure>
                    </a>
                    <div class="media-body mt-2">
                        @if(isset($isDeleted) && $isDeleted)
                            <button type="button" data-id="{{ $image['id'] }}" class="btn btn-primary btn-block mb-1 dodelete">
                                ????kili sil
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    @push('extrascripts')
        <script src="{{ asset('/backend/js/lightcase.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                let showcase = $('a.showcase'),
                    dodelete = $('.dodelete'),
                    docover = $('.docover');

                showcase.lightcase({
                    transition: 'scrollHorizontal',
                    showSequenceInfo: false,
                    showTitle: false
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                docover.click(function (e) {
                    e.preventDefault();
                    Swal.fire(
                        {
                            title: '????kili ??rt??k ????kili etm??k ist??diyiniz?? ??minsiniz?',
                            text:  'Bu ????kili ??rt??k ????kili etm??k ist??diyiniz?? ??minsiniz?',
                            icon:  'warning',
                            showCancelButton:   true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor:  '#d33',
                            confirmButtonText:  'B??li',
                            cancelButtonText:   '{{ trans('backend.buttons.cancel') }}'
                        }).then((result) => {
                        let id = $(this).data('id');
                        $.ajax({
                            type: 'patch',
                            url: '/admin/{{ $name }}/' + id + '/coverimg',
                            data: {'id': id},
                            dataType: 'json',
                            success: function (result)
                            {
                                if (result.status != 1) {
                                    {!! notify('error', trans('backend.messages.error.cover')) !!}
                                } else {
                                    {!! notify('success', trans('backend.messages.success.cover')) !!}
                                }
                                location.reload();

                            },
                        });
                    });


                });

                dodelete.click(function(e)
                {
                    e.preventDefault();

                    {!! confirm() !!}.then((result) =>
                    {
                        if (result.isConfirmed)
                        {
                            let id = $(this).data('id');
                            $.ajax({
                                type: 'delete',
                                url: '/admin/{{ $name }}/' + id + '/deleteimg',
                                data: {'id': id},
                                dataType: 'json',
                                success: function (result)
                                {
                                    if (result.status !== 1) {
                                        {!! notify('error', trans('backend.messages.error.delete')) !!}
                                    } else {
                                        {!! notify('success', trans('backend.messages.success.delete')) !!}
                                        $('#' + id).remove();
                                    }

                                    location.reload();

                                }
                            });
                        }
                    });
                });


            });
        </script>
    @endpush
@endif
