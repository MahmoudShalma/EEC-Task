@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Add Shipment
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Add Shipment
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <form method="post" action="{{ route('shipments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">shipment Data</h6><br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Address : <span class="text-danger">*</span></label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                            @if ($errors->has('address'))
                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Description : <span class="text-danger">*</span></label>
                            <textarea name="description" rows="6" class="form-control">{{ old('name') }}</textarea>
                            @if ($errors->has('description'))
                                <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Courier : <span class="text-danger">*</span></label>
                            <select name="courier_id" class="form-control p-10">

                                <option value="">Select Courier</option>
                                @foreach ($couriers as $courier)
                                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('courier_id'))
                                <div class="alert alert-danger">{{ $errors->first('courier_id') }}</div>
                            @endif
                        </div>
                    </div>


                    <div class="repeater mb-3">
                        <div data-repeater-list="products">
                            <div data-repeater-item="">
                                <div class=" row mb-30">
                                    <div class="col-lg-2">
                                        <input class="form-control" type="number" name="count" placeholder="count"
                                            min="1">
                                        @if ($errors->has('products.*.count'))
                                            <div class="alert alert-danger">{{ $errors->first('products.*.count') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-lg-2">
                                        <select name="product_id" class="form-control p-10">

                                            <option value="">Select Proudct</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('products.*.product_id'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('products.*.product_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="d-grid">
                                            <input class="btn btn-danger" data-repeater-delete="" type="button"
                                                value="Delete">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-20">
                            <div class="col-12 ">
                                <input class="button p-2" data-repeater-create="" type="button" value="Add new">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success nextBtn btn-lg pull-right" type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
