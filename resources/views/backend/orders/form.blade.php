@extends('layouts.backend.master')
@section('title', trans('backend.titles.orders'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid" id="optionGroupApp">
            <div class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'orders'])
                    <form action="{{ route('backend.orders.update', ['order' => $order->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input type="checkbox" class="bool" name="status" value="{{ isset($order) ? $order->status : old('status') }}"  {{ (isset($order) ? old('status',$order->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                                                 <span></span>
                                             </label>
                                         </span>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        @include('backend.includes.form.footer')--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection


