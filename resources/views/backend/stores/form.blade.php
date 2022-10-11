@extends('layouts.backend.master')
@section('title', trans('backend.titles.stores'))
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
                    @include('backend.includes.form.header', ['page' => 'stores'])
                    <form action="{{ $edit === false ? route('backend.stores.store') :  route('backend.stores.update', ['store' => $store->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.title')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ isset($store) ? $store->title : old('title')  }}" placeholder="@lang('backend.placeholders.enter.title')">
                                        </div>
                                        @error('title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="district_id" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.district')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <select id="district_id" class="select2 form-control @error('district_id') is-invalid @enderror" name="district_id">
                                            <option  disabled selected value="">@lang('backend.placeholders.select.district')</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"  @if(isset($store) ? $store->district_id : old('district_id') == $district->id) selected @endif>
                                                    {{ $district->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.address')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ isset($store) ? $store->address : old('address')  }}" placeholder="@lang('backend.placeholders.enter.address')">
                                        </div>
                                        @error('address')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="latitude" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.latitude')
{{--                                    <span class="text-danger">*</span>--}}
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ isset($store) ? $store->latitude : old('latitude') ?? 40.3715909  }}" placeholder="@lang('backend.placeholders.enter.latitude')">
                                        </div>
                                        @error('latitude')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="longitude" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.longitude')
{{--                                    <span class="text-danger">*</span>--}}
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ isset($store) ? $store->longitude : old('longitude') ?? 49.9237618   }}" placeholder="@lang('backend.placeholders.enter.longitude')">
                                        </div>
                                        @error('longitude')
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
                                                 <input type="checkbox" class="bool" name="status" value="{{ isset($slider) ? $store->status : old('status') }}"  {{ (isset($store) ? old('status',$store->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                                                 <span></span>
                                             </label>
                                         </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 p10 map">
                                    <div id="map_canvas" class="mapdisable" style="width: 100%; height: 450px"></div>
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


        function initMap() {

            var uluru = {lat: 40.3715909, lng: 49.9237618};
            var map = new google.maps.Map(document.getElementById('map_canvas'), {

                zoom: 14,
                center: uluru

            });

            var marker;
            function placeMarker(location) {

                if ( marker ) {

                    marker.setPosition(location);

                } else {

                    marker = new google.maps.Marker({

                        position: uluru,

                        map: map,

                        icon: 'https://maps.google.com/mapfiles/ms/icons/green-dot.png'

                    });

                }

            }

            placeMarker(uluru);

            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
                GetAddress(event.latLng.lat(),event.latLng.lng());
            });

        }

        function GetAddress($a,$b) {
            var lat = $a;
            var lng = $b;
            var latlng = new google.maps.LatLng(lat, lng);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        $('#latitude').val(lat);
                        $('#longitude').val(lng);
                    }
                }
            });
        }

        $(function () {
            let select2 = $('.select2');
            select2.select2({
                minimumResultsForSearch: 3,
                theme: 'bootstrap4',
                placeholder: 'Axtardığınız'
            });
            $('#map_canvas').click(function () {
                if ( navigator.geolocation ){

                    navigator.geolocation.getCurrentPosition(function(pos){

                        var a = pos.coords.latitude,
                            b = pos.coords.longitude;
                        GetAddress(a,b)

                    });

                } else {
                    alert('Bu funskiya sizin cihazda işləmir.');
                }

            });

        });
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEpR-rllyBBaikIMuxX5s03h8-hT-D_Pk&callback=initMap">
    </script>
 @endsection
