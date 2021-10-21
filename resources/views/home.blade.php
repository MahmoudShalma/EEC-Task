<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')

</head>

<body>

    <div class="wrapper">

        <!-- main-content -->
        <div class="content-wrapper">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Search') }}</div>


                            <div class="card-body">

                                <form method="get" action="{{ route('home') }}">

                                    <div class="form-group row">
                                        <label for="Shipment Number"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Shipment Number') }}</label>

                                        <div class="col-md-6">
                                            <input id="shipment_number" type="text" class="form-control "
                                                name="shipment_number" value="{{ old('shipment_number') }}" required
                                                autofocus>


                                        </div>
                                    </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Search') }}
                                            </button>


                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Result') }}</div>
                            <div class="card-body">
                                @if ($message)
                                    <div class="row">
                                        <span>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> shipment_number :</label>
                                            <input type="text" value="{{ $shipment->shipment_number }}" readonly
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label> Status :</label>
                                            <input type="text" value="{{ $shipment->status }}" readonly
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label> Address :</label>
                                            <input type="text" value="{{ $shipment->address }}" readonly
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label> Description :</label>
                                            <textarea name="description" rows="6" readonly
                                                class="form-control">{{ $shipment->description }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label> courier :</label>
                                            <input type="text" value="{{ $shipment->courier->name }}" readonly
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label> Products :</label>
                                            @foreach ($shipment->products as $product)
                                                <input type="text"
                                                    value="{{ $product->pivot->count }} {{ $product->name }}"
                                                    readonly class="form-control">
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


</body>

</html>
