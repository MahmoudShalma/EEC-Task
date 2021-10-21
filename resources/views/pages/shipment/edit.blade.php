@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Edit shipment
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Edit shipment
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

                <form action="{{ route('shipments.update', $shipment->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">Shipment Data</h6><br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Address : <span class="text-danger">*</span></label>
                            <input type="text" name="address" value="{{ $shipment->address }}" class="form-control">
                            @if ($errors->has('address'))
                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Status : <span class="text-danger">*</span></label>
                            <select name="status" class="form-control p-10">

                                <option value="Pending" @if ($shipment->status == 'Pending') selected @endif>Pending</option>
                                <option value="Picked_By_Courier" @if ($shipment->status == 'Picked_By_Courier') selected @endif>picked by courier</option>
                                <option value="Out_For_Delivery" @if ($shipment->status == 'Out_For_Delivery') selected @endif>out for delivery</option>
                                <option value="Delivered" @if ($shipment->status == 'Delivered') selected @endif>Delivered </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Description : <span class="text-danger">*</span></label>
                            <textarea name="description" rows="6"
                                class="form-control">{{ $shipment->description }}</textarea>
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
                                    <option value="{{ $courier->id }}" @if ($shipment->courier_id == $courier->id) selected @endif>{{ $courier->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('courier_id'))
                                <div class="alert alert-danger">{{ $errors->first('courier_id') }}</div>
                            @endif
                        </div>
                    </div>


                    <div class="repeater mb-3">
                        <div data-repeater-list="products">
                            @if(count($shipment->products))
                                @foreach ($shipment->products as $shipmentProduct)
                                    <div data-repeater-item="">
                                        <div class=" row mb-30">
                                            <div class="col-lg-2">
                                                <input class="form-control" min="1" type="number" name="count"
                                                    placeholder="count" value="{{ $shipmentProduct->pivot->count }}">
                                                @if ($errors->has('products.*.count'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('products.*.count') }}</div>
                                                @endif
                                            </div>

                                            <div class="col-lg-2">
                                                <select name="product_id" class="form-control p-10">

                                                    <option value="">Select Proudct</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" @if ($shipmentProduct->pivot->product_id == $product->id) selected @endif>
                                                            {{ $product->name }}</option>
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

                                @endforeach
                            @else
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
                            @endif

                        </div>
                        <div class="row mt-20">
                            <div class="col-12">
                                <input class="button p-2" data-repeater-create="" type="button" value="Add new">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success nextBtn btn-lg pull-right" type="submit">update</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
