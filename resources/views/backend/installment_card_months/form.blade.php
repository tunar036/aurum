@extends('layouts.backend.master')
@section('title', trans('backend.titles.installment-card-months'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">

    <style>
        .select2 {
            width:100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom example example-compact">
                    <form action="{{ $edit === false ? route('backend.installment-card-months.store') :  route('backend.installment-card-months.update', $installment_card_month->id) }}" method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="installment_card_id" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.installment_card')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <select class="form-control @error('installment_card_id') is-invalid @enderror" name="installment_card_id">
                                            <option value="">Seçin</option>
                                            @foreach ($installmentCards as $installmentCard)
                                                <option value="{{ $installmentCard->id }}" @if($edit && $installment_card_month->installment_card_id == $installmentCard->id ) selected @endif  @if(old('installment_card_id') == $installmentCard->id ) selected @endif>
                                                    {{ $installmentCard->transname ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('installment_card_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.month')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="month" type="number" class="form-control @error('month') is-invalid @enderror" name="month" value="{{ isset($installment_card_month) ? $installment_card_month->month : old('month') }}">
                                        @error('month')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input type="checkbox" class="bool" checked name="status" value="{{ isset($installment_card_month) ? $installment_card_month->status : 1 }}" @if(isset($installment_card_month) ? $installment_card_month->status : old('status') == 1) checked @endif>
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
    <script src="{{ asset('/backend/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4',
                minimumResultsForSearch: 20,
                placeholder: 'Axtardığınız'
            });
        });
    </script>

@endsection
