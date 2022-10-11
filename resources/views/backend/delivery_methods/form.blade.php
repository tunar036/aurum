@extends('layouts.backend.master')
@section('title', trans('backend.titles.delivery-methods'))
@section('styles')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'delivery-methods'])
                    <form action="{{ $edit === false ? route('backend.delivery-methods.store') :  route('backend.delivery-methods.update', ['delivery_method' => $delivery_method->id]) }}" method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <ul class="nav nav-light-primary nav-pills" role="tablist">
                                        @foreach ($langs as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif" id="tab-{{ $lang->code }}" data-toggle="tab" href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif" id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="name:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.name') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="name:{{ $lang->code }}" type="text" class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif"  name="name:{{ $lang->code }}" value="{{ isset($delivery_method) ? $delivery_method->translate($lang->code)->name : old('name:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.name')">
                                                    @if ($errors->has("name:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("name:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

{{--                                        <div class="form-group row">--}}
{{--                                            <label for="address:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">--}}
{{--                                                @lang('backend.labels.address') ({{ strtoupper($lang->code) }})--}}
{{--                                            </label>--}}
{{--                                            <div class="col-lg-6 col-md-9 col-sm-12">--}}
{{--                                                <div class="input-group">--}}
{{--                                                       <textarea name="address:{{ $lang->code }}" id="address" cols="30" rows="10" class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif" >--}}
{{--                                                          {{   isset($delivery_method) ? $delivery_method->address : old('address:'.$lang->code) ?? '' }}--}}
{{--                                                        </textarea>--}}
{{--                                                    @if ($errors->has("address:$lang->code"))--}}
{{--                                                        <div class="invalid-feedback">{{ $errors->first("address:$lang->code") }}</div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                    </div>
                                @endforeach
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label class="col-form-label text-right col-lg-3 col-sm-12">--}}
{{--                                    @lang('backend.labels.price')--}}
{{--                                </label>--}}
{{--                                <div class="col-lg-6 col-md-9 col-sm-12">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ isset($delivery_method) ? $delivery_method->price : old('price') }}" placeholder="@lang('backend.placeholders.enter.price')" step=0.01>--}}
{{--                                        @error('price')--}}
{{--                                        <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input type="checkbox" class="bool" checked name="status" value="{{ isset($delivery_method) ? $delivery_method->status : 1 }}" @if(isset($delivery_method) ? $delivery_method->status : old('status') == 1) checked @endif>
                                                 <span></span>
                                             </label>
                                         </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
 @endsection
