@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Dashboard
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Dashboard
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Number Of Products</h5>
                <p class="card-text">
                <h3> {{ $products_num }}</h3>
                </p>
                <a href={{ route('products.index') }} class="btn btn-primary">Go Direct</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Number Of Couriers</h5>
                <p class="card-text">
                <h3> {{ $couriers_num }}</h3>
                </p>
                <a href={{ route('couriers.index') }} class="btn btn-primary">Go Direct</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Number Of Shipments</h5>
                <p class="card-text">
                <h3> {{ $shipments_num }}</h3>
                </p>
                <a href={{ route('shipments.index') }} class="btn btn-primary">Go Direct</a>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->


@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
