@extends('layouts.backend.master')
@section('title', trans('backend.titles.dashboard'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 ">
                        <a href="{{ admin()->can('menus index') ? route('backend.menus.index') : 'javascript:;' }}" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                   <i class="text-white fa fa-2x fa-list-alt"></i>
                                </span>
                                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">{{ $totalMenus }}</div>
                                <div class="font-weight-bold text-inverse-primary font-size-lg">@lang('backend.widgets.total_menus')</div>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-lg-3 ">
                        <a href="{{ admin()->can('users index') ? route('backend.users.index') : 'javascript:;' }}" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                   <i class="text-white fa fa-2x fa-users"></i>
                                </span>
                                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">{{ $totalUsers }}</div>
                                <div class="font-weight-bold text-inverse-primary font-size-lg">@lang('backend.widgets.total_customers')</div>
                            </div>
                        </a>
                    </div> --}}
                    {{-- <div class="col-lg-3 ">
                        <a href="{{ admin()->can('campaigns index') ? route('backend.campaigns.index') : 'javascript:;' }}" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                   <i class="text-white fa fa-2x fa-badge-percent"></i>
                                </span>
                                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">{{ $totalCampaigns }}</div>
                                <div class="font-weight-bold text-inverse-primary font-size-lg">@lang('backend.widgets.total_campaigns')</div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="col-lg-3 ">
                        <a href="{{ admin()->can('companies index') ? route('backend.companies.index') : 'javascript:;' }}" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                   <i class="text-white fa fa-2x fa-badge-percent"></i>
                                </span>
                                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">{{ $totalCompanies }}</div>
                                <div class="font-weight-bold text-inverse-primary font-size-lg">@lang('backend.widgets.total_companies')</div>
                            </div>
                        </a>
                    </div>



                    <div class="col-lg-3 ">
                        <a href="{{ admin()->can('faqs index') ? route('backend.faqs.index') : 'javascript:;' }}" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <i class="text-white fa fa-2x fa-question"></i>
                                </span>
                                <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">{{ $totalFaqs }}</div>
                                <div class="font-weight-bold text-inverse-success font-size-lg">@lang('backend.widgets.total_faqs')</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 ">
                        <a href="{{ admin()->can('settings index') ? route('backend.settings.index') : 'javascript:;' }}" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <i class="text-white fa fa-2x fa-recycle" aria-hidden="true"></i>
                                </span>
                                <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">{{ $totalSettings }}</div>
                                <div class="font-weight-bold text-inverse-success font-size-lg">@lang('backend.widgets.total_settings')</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    @css('backend/css/sweetalert.min.css')
@endsection
@section('scripts')
    @js('backend/js/sweetalert.min.js')
@endsection
