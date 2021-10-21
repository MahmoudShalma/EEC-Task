<?php

namespace App\Http\Controllers;

use App\models\Courier;
use App\models\Product;
use App\models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipments = Shipment::all();
    
        return view('pages.shipment.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $couriers = Courier::all();
        $products = Product::all();

        return view('pages.shipment.create', compact('couriers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'description' => 'required',
            'courier_id' => 'required|exists:couriers,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.count' => 'required|integer|min:1',
        ]);

        $validated['status'] = "Pending";
        $validated['shipment_number'] = round(microtime(true) * 1000);

        $shipment = Shipment::create($validated);

        foreach ($request->products as $product) {
            $shipment->products()->attach($product['product_id'], ['count' => $product['count']]);
        }
        return redirect(route('shipments.index'))->with('success', 'Shipment added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Shipment  $Shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $Shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        $couriers = Courier::all();
        $products = Product::all();
        $shipment->load("products");
        //return $shipment;


        return view('pages.shipment.edit', compact('couriers', 'products', 'shipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        $validated = $request->validate([
            'address' => 'required',
            'description' => 'required',
            'status' => 'required',
            'courier_id' => 'required|exists:couriers,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.count' => 'required|integer|min:1',
        ]);

        $shipment->update($validated);

        $shipment->products()->detach();
        foreach ($request->products as $product) {
            $shipment->products()->attach($product['product_id'], ['count' => $product['count']]);
        }
        return redirect(route('shipments.index'))->with('success', 'Shipment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect(route('shipments.index'))->with('success', 'Shipment deleted successfully');
    }
}
