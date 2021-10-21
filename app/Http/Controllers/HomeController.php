<?php

namespace App\Http\Controllers;

use App\models\Courier;
use App\models\Product;
use App\User;

use App\models\Shipment;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function dashboard()
    {

        $products_num = Product::all()->count();
        $couriers_num = Courier::all()->count();
        $shipments_num = Shipment::all()->count();

        return view("dashboard", compact('products_num', 'couriers_num', 'shipments_num'));
    }

    public function index()
    {

        $shipmentNumber = request()->shipment_number;
        $shipment = Shipment::with(["courier", "products"])->where("shipment_number", $shipmentNumber)->first();
        $message = "";
        if (!$shipment) {
            $message = "Please Enter Shipment Number";
            if (isset(request()->shipment_number)) {
                $message = "Wrong Shipment Number";
            }
        }


        return view('home', compact('shipment', 'message'));
    }
}
