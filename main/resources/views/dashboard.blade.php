@extends('layouts.master')
@section('js')
<script src="{{ asset('/main/public') }}/js/map-status.js" type="text/javascript"></script>
@endsection
@section('content')
    <div class="main_section_area">
        <div id="map"></div>
    </div>
@endsection
