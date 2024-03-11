<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SSOController extends Controller
{
    public function ImportTaxCustomers(Request $request){

        $accessToken = config('app.access_token');

        $access_token =  $accessToken; // Set your access token here
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->get("http://127.0.0.1:8000/api/user");
    
        // Handle the response
        return $response->json();
	} // end method

}
