@extends('layouts.backend.master')
@section('title', trans('backend.titles.faqs'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'faqs'])
                    <form action="{{ $edit === false ? route('backend.faqs.store') : route('backend.faqs.update', ['faq' => $faq->id]) }}" method="POST">
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
                                            <label for="question" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.question') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="question" type="text" class="form-control @if($errors->has("question:$lang->code")) is-invalid @endif" name="question:{{ $lang->code }}" value="{{  isset($faq) ? $faq->translate($lang->code)->question : old('question:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.question')">
                                                    @if ($errors->has("question:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("question:$lang->code")  }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="answer" class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                                @lang('backend.labels.answer') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                   <textarea id="answer" class="summernote @if($errors->has("answer:$lang->code")) is-invalid @endif" name="answer:{{ $lang->code }}" placeholder="@lang('backend.placeholders.enter.answer')">
                                                      {!! isset($faq) ? $faq->translate($lang->code)->answer : old('answer:'.$lang->code) !!}
                                                   </textarea>`
                                                    @if ($errors->has("answer:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("answer:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                      <span class="switch switch-md switch-icon">
                                              <label>
                                                  <input type="checkbox" class="bool" name="status" value="{{ isset($faq) ? $faq->status : old('status') }}"  {{ (isset($faq) ? $faq->status :  old('status')) == 1 ? 'checked' : '' }}>
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
    <script>
        let text = $('.summernote');

        text.summernote({height: 300 });

    </script>
@endsection
