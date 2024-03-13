<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use App\Models\OpenAISettings;
use OpenAI;
use Illuminate\Support\Carbon;

class ExpertController extends Controller
{
    public function ExpertAdd(){
        $experts = Expert::latest()->get();
        return view('backend.expert.expert_add', compact('experts'));
    }

    public function ExpertStore(Request $request)
    {

        $expert_id = Expert::insertGetId([
            
            'expert_name' => $request->expert_name,
            'character_name' => $request->character_name,
            'slug' => $request->expert_name,
            'description' => $request->description,
            'role' => $request->role,
            'expertise' => $request->expertise,
            'active' => '1',
            'created_at' => Carbon::now(),   
    
          ]);

        $notification = array(
            'message' => 'Expert Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    // CHAT
    public function index()
    {
        $experts = Expert::latest()->get();
        return view('backend.expert.expert_manage', compact('experts'));
    }

    public function ExpertChat($id)
    {
        $expert_selected = Expert::findOrFail($id);
        $expert_selected_id = $id;
        $experts = Expert::latest()->get();
        return view('backend.expert.chat', compact('experts','expert_selected_id','expert_selected'));
    }


    public function SendMessages(Request $request){

            $search = $request->input('message');
            $expert = $request->input('expert');
            $expert_id = Expert::findOrFail($expert);

            $setting = OpenAISettings::find(1);
            $apiKey = config('app.openai_api_key');
            $client = OpenAI::client($apiKey);
            $user_input =  $search;
           
            $prompt = "You will now play a character and respond as that character (You will never break character). I want you to act as a $expert_id->role. With your vast expertise in the $expert_id->role for past 40 years, I need your help. As a $expert_id->role please answer this, $user_input. If anyone asks any questions outside of $expert_id->role, please respond with 'I am not programmed to respond to those inquiries.'";

    
    $result = $client->completions()->create([
                "model" => $setting->openaimodel,
                "temperature" => 0,
                "top_p" => 1,
                "frequency_penalty" => 0,
                "presence_penalty" =>0,
                'max_tokens' => 500,
                'prompt' => $prompt,
            ]);
        
            $content = trim($result['choices'][0]['text']);
    
            // return view('backend.custom_template.template_view', compact('title', 'content'));
            return array('prompt' => $prompt, 'content' => $content);
            // return $content;
    }

    // public function sendMessage(Request $request)
    // {

    //     // Get the user's input from the request
    //     $search = $request->input('message');

    //     $apiKey = config('app.openai_api_key');
	// 	$client = OpenAI::client($apiKey);
    //     $setting = OpenAISettings::find(1);
    //     // Initialize an empty array to store messages
    //     $conversation = [];

    //     try {

    //         $result = $client->completions()->create([
    //             "model" => $setting->openaimodel,
    //             "temperature" => 0,
    //             "top_p" => 1,
    //             "frequency_penalty" => 0,
    //             "presence_penalty" => 0,
    //             'max_tokens' => 100,
    //             'prompt' => $search,
    //         ]);
    //         // Send user message to OpenAI
    //         // $data = Http::withHeaders([
    //         //     'Content-Type' => 'application/json',
    //         //     'Authorization' => 'Bearer api_key_here',
    //         // ])->post('https://api.openai.com/v1/chat/completions', [
    //         //     'model' => 'gpt-3.5-turbo',
    //         //     'messages' => $conversation, // Pass the entire conversation to the API
    //         //     'temperature' => 0.5,
    //         //     'max_tokens' => 150,
    //         //     'top_p' => 1.0,
    //         //     'frequency_penalty' => 0.52,
    //         //     'presence_penalty' => 0.5,
    //         //     'stop' => ["11."], // Check and correct the stop sequence
    //         // ])->json();

    //         // Check if the response contains the 'choices' key
    //         if (isset($content['choices'])) {
    //             // Get the response from OpenAI
    //             $content = trim($result['choices'][0]['text']);

    //             // Add user message and AI response to the conversation
    //             $conversation[] = [
    //                 'role' => 'user',
    //                 'content' => $search
    //             ];
    //             $conversation[] = [
    //                 'role' => 'assistant',
    //                 'content' => $content
    //             ];

    //             // Check if the conversation should continue based on some condition
             
    //                 // Return the entire conversation as JSON
    //                 // return response()->json($conversation, 200, [], JSON_PRETTY_PRINT);
    //                 return response()->json(['content' => $content], 200, [], JSON_PRETTY_PRINT);
    //             }
           
    //     } catch (\Exception $e) {
    //         // Handle any exceptions that occur during the API call
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

}