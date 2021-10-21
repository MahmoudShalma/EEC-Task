<?php

namespace App\Http\Controllers;

use App\models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers = Courier::all();
        return view('pages.couriers.index', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.couriers.create');
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
            'name' => 'required|max:200',
            'address' => 'required',
            'number' => 'required|unique:couriers|digits:11',

        ]);


        $couriered = new Courier();

        $couriered->name = $request->name;
        $couriered->address = $request->address;
        $couriered->number = $request->number;

        $couriered->save();

        return redirect(route('couriers.index'))->with('success', 'couriered added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Courier  $Courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $Courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Courier  $Courier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $couriered = Courier::findorfail($id);

        return view('pages.couriers.edit', compact('couriered'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Courier  $Courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
            'address' => 'required',
            'number' => 'required|digits:11|unique:couriers,number,' . $request->id,

        ]);


        $couriered = Courier::findorfail($request->id);

        $couriered->name = $request->name;
        $couriered->address = $request->address;
        $couriered->number = $request->number;

        $couriered->save();

        return redirect(route('couriers.index'))->with('success', 'couriered updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Courier  $Courier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $couriered = Courier::findorfail($id);

        Courier::destroy($id);


        return redirect()->back()->with('success', 'couriered Deleted successfully');
    }
}
