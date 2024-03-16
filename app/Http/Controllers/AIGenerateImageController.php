<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIGenerateImageController extends Controller
{
    public function AIGenerateImageView(){
        // $brands = Brand::latest()->get();
        return view('backend.image_generate.generate_image');
    }


    public function generateImage(Request $request) {
  
		$apiKey = config('app.openai_api_key');
        $size = '1024x1024';
		$quality = 'standard';
		$n = 1;
        $mood = 'standard';
        $response = null;


     if($request->dall_e_2){

        if($request->style){
            $quality = $request->style;
        }

        if($request->mood){
            $mood = $request->mood;
        }

        if($request->image_res){
            $size = $request->image_res;
        }

        if($request->no_of_result){
            $n = $request->no_of_result;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/images/generations', [
            'prompt' => $request->prompt,
            'size' => $size,
            'quality' => $quality,
            'n' => $n,
        ]);
    }
    // DAll-e 2 End

    if($request->dall_e_3){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/images/generations', [
            'model' => 'dall-e-3',
            'prompt' => $request->prompt,
            'size' => $size,
            'quality' => $quality,
            'n' => $n,
        ]);
    }
     // DAll-e 3 End


     if ($response !== null) { // Check if $response is not null before using it
        if ($response->successful()) {
            $responseData = $response->json();
            $imageURL = $responseData['data'][0]['url'];
            return response()->json(['imageURL' => $imageURL]);
            // return view('backend.image_generate.generate_image', ['imageURL' => $imageURL]);
        } else {
            return response()->json(['error' => 'Failed to generate image'], 500);
        }
    } else {
        return response()->json(['error' => 'No condition met'], 500);
    }

    }


}
