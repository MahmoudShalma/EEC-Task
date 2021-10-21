@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Add Product
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Add Product
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">Product Data</h6><br>
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
                            <label>Image : <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
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
