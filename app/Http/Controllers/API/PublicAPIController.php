<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PublicAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $res = Http::get("https://jsonplaceholder.typicode.com/posts");
       return response()->json(
           ["data" => $res->json() ]
       );
    }
}
