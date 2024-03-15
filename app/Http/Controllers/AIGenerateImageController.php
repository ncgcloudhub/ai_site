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

		$size = '256x256';
		$quality = 'standard';
		$n = 1;
	
		$apiKey = config('app.openai_api_key');

		// dd($apiKey);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/images/generations', [
            // 'model' => 'dall-e-3',
            'prompt' => $request->prompt,
            'size' => $size,
            'quality' => $quality,
            'n' => $n,
        ]);

		if ($response->successful()) {
            $responseData = $response->json();
            $imageURL = $responseData['data'][0]['url']; // Make sure to validate this path depending on the actual response structure
            // return response()->json(['image_url' => $imageURL]);

			return view('backend.image_generate.generate_image', ['imageURL' => $imageURL]);
        } else {
            // Handle the error accordingly
            return response()->json(['error' => 'Failed to generate image'], 500);
        }

    }

}
