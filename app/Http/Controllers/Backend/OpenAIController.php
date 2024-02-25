<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OpenAISettings;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use OpenAI;

class OpenAIController extends Controller
{
    public function OpenAIsettingsView(){
        // $brands = Brand::latest()->get();
        return view('backend.openai.index');
    }


    public function StoreOpenAIsettings(Request $request){


      $openai_settings = OpenAISettings::insertGetId([
      	
		'openaiapikey' => $request->openaiapikey,
		'openaimodel' => $request->openaimodel,
		
      	'created_at' => Carbon::now(),   

      ]);


       $notification = array(
			'message' => 'Settings Changed Successfully',
			'alert-type' => 'success'
		);

		// return redirect()->route('manage-product')->with($notification);
		return redirect()->back()->with($notification);

	} // end method

    public function openaigenerate(Request $input)
	{

        $setting = OpenAISettings::find(1);

		if ($input->title == null) {
			return;
		}

		$title = $input->title;
		$main_points = $input->main_points;
		$tone = 'professional';
		$max_tokens = 100;
		
		$client = OpenAI::client('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');

		if($input->max_result_length != NULL){
			$max_tokens = intval($input->max_result_length); 
		}

		if($input->tone != NULL){
			$tone = $input->tone; 
		}
		

		$prompt = 'Write article about ' . $title . ' and it should include main points such as ' . $main_points . 'and the tone should be ' . $tone;
       
		$result = $client->completions()->create([
			"model" => $setting->openaimodel,
			"temperature" => 0.7,
			"top_p" => 1,
			"frequency_penalty" => 0,
			"presence_penalty" => 0,
			'max_tokens' => $max_tokens,
			'prompt' => $prompt,
		]);
	
		$content = trim($result['choices'][0]['text']);
	    // dd($content);
	
		return view('backend.openai.blog_generate', compact('title', 'content'));
	}

	public function BlogGenerate(){
		$title = '';
		$content = '';
        return view('backend.openai.blog_generate', compact('title', 'content'));
    }
	
}
