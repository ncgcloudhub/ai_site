<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use App\Models\OpenAISettings;
use OpenAI;

class ExpertController extends Controller
{
    public function ExpertAdd(){
        $experts = Expert::latest()->get();
        return view('backend.expert.expert_add', compact('experts'));
    }

    public function saveExpert(Request $request)
    {
        // Validate incoming request if needed
        $validatedData = $request->validate([
            'expert_name' => 'required|string',
            'character_name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
            'role' => 'required|string',
            'expertise' => 'required|string',
            'train_expert' => 'required|string',
            'image' => 'required|string',
            'active' => 'required|string',
        ]);

        // Create a new expert instance
        $expert = new Expert();
        
        // Assign values from the request
        $expert->expert_name = $validatedData['expert_name'];
        $expert->character_name = $validatedData['character_name'];
        $expert->slug = $validatedData['slug'];
        $expert->description = $validatedData['description'];
        $expert->role = $validatedData['role'];
        $expert->expertise = $validatedData['expertise'];
        $expert->train_expert = $validatedData['train_expert'];
        $expert->image = $validatedData['image'];
        $expert->active = $validatedData['active'];
        
        // Save the expert
        $expert->save();

        // Optionally, you can return a response or redirect
        return response()->json(['message' => 'Expert saved successfully'], 200);
    }


    // CHAT
    public function index()
    {
        return view('backend.expert.index');
    }


    public function SendMessages(Request $request){
        $search = $request->input('message');

             $setting = OpenAISettings::find(1);
            $apiKey = config('app.openai_api_key');
            $client = OpenAI::client($apiKey);
            $prompt =  $search;
    
    $result = $client->completions()->create([
                "model" => $setting->openaimodel,
                "temperature" => 0,
                "top_p" => 1,
                "frequency_penalty" => 0,
                "presence_penalty" =>0,
                'max_tokens' => 700,
                'prompt' => $prompt,
            ]);
        
            $content = trim($result['choices'][0]['text']);
    
            // return view('backend.custom_template.template_view', compact('title', 'content'));
            return $content;
    }

    public function sendMessage(Request $request)
    {

        // Get the user's input from the request
        $search = $request->input('message');

        $apiKey = config('app.openai_api_key');
		$client = OpenAI::client($apiKey);
        $setting = OpenAISettings::find(1);
        // Initialize an empty array to store messages
        $conversation = [];

        try {

            $result = $client->completions()->create([
                "model" => $setting->openaimodel,
                "temperature" => 0,
                "top_p" => 1,
                "frequency_penalty" => 0,
                "presence_penalty" => 0,
                'max_tokens' => 100,
                'prompt' => $search,
            ]);
            // Send user message to OpenAI
            // $data = Http::withHeaders([
            //     'Content-Type' => 'application/json',
            //     'Authorization' => 'Bearer api_key_here',
            // ])->post('https://api.openai.com/v1/chat/completions', [
            //     'model' => 'gpt-3.5-turbo',
            //     'messages' => $conversation, // Pass the entire conversation to the API
            //     'temperature' => 0.5,
            //     'max_tokens' => 150,
            //     'top_p' => 1.0,
            //     'frequency_penalty' => 0.52,
            //     'presence_penalty' => 0.5,
            //     'stop' => ["11."], // Check and correct the stop sequence
            // ])->json();

            // Check if the response contains the 'choices' key
            if (isset($content['choices'])) {
                // Get the response from OpenAI
                $content = trim($result['choices'][0]['text']);

                // Add user message and AI response to the conversation
                $conversation[] = [
                    'role' => 'user',
                    'content' => $search
                ];
                $conversation[] = [
                    'role' => 'assistant',
                    'content' => $content
                ];

                // Check if the conversation should continue based on some condition
             
                    // Return the entire conversation as JSON
                    // return response()->json($conversation, 200, [], JSON_PRETTY_PRINT);
                    return response()->json(['content' => $content], 200, [], JSON_PRETTY_PRINT);
                }
           
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the API call
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}