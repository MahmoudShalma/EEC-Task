@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Shipments
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Shipments
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ route('shipments.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">Add Shipment </a><br><br>

                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Shipment Number</th>
                                            <th> Courier</th>
                                            <th> Status</th>
                                            <th>Processes</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shipments as $shipment)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $shipment->shipment_number }}</td>
                                                <td>{{ $shipment->courier->name }}</td>
                                                <td>{{ $shipment->status }}</td>

                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                            role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Processes
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item"
                                                                href="{{ route('shipments.edit', $shipment->id) }}"><i
                                                                    style="color:green"
                                                                    class="fa fa-edit"></i>&nbsp; Edit
                                                            </a>
                                                            <a class="dropdown-item"
                                                                data-target="#Delete_shipment{{ $shipment->id }}"
                                                                data-toggle="modal"
                                                                href="##Delete_shipment{{ $shipment->id }}"><i
                                                                    style="color: red" class="fa fa-trash"></i>&nbsp;
                                                                Delete </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('pages.shipment.delete')
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
