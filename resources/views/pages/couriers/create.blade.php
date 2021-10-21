@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Add Couriered
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Add Couriered
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form method="post" action="{{ route('couriers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">couriered Data</h6><br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Name : <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>

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
                            <label> Number : <span class="text-danger">*</span></label>
                            <input type="text" name="number" value="{{ old('number') }}" class="form-control">
                            @if ($errors->has('number'))
                                <div class="alert alert-danger">{{ $errors->first('number') }}</div>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
