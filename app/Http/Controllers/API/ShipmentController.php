<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $apiKey = $request->header("api-key");
        if($apiKey != env("API_KEY")|| empty($apiKey)) {
            return response()->json([
                "message" => "Unautherized"
            ], 401);
        }
        $shipments = Shipment::all();
        return response()->json([
            "shipments" => $shipments
        ], 200);
    }
}
