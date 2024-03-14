<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OpenAISettings;
use App\Models\CustomTemplate;
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
		

		$language = 'English';
		$max_result_length_value = 100;
		$temperature_value = 0;
		$top_p_value = 1;
		$frequency_penalty_value = 0;
		$presence_penalty_value = 0;
		$tone = 'professional';
		$creative_level = 'high';
		
		
		$apiKey = config('app.openai_api_key');
		$client = OpenAI::client($apiKey);
		

		if($input->language != NULL){
			$language = $input->language; 
		}

		if($input->max_result_length_value != NULL){
			$max_result_length_value = intval($input->max_result_length_value); 
		}

		if($input->temperature_value != NULL){
			$temperature_value = $input->temperature_value; 
		}

		if($input->top_p_value != NULL){
			$top_p_value = $input->top_p_value; 
		}

		if($input->frequency_penalty_value != NULL){
			$frequency_penalty_value = $input->frequency_penalty_value; 
		}

		if($input->presence_penalty_value != NULL){
			$presence_penalty_value = $input->presence_penalty_value; 
		}

		if($input->tone != NULL){
			$tone = $input->tone; 
		}

		if($input->creative_level != NULL){
			$creative_level = $input->creative_level; 
		}
		

		$prompt =  $input->prompt;

		$prompt .= 'Write in ' . $language . ' language. Creativity level should be ' . $creative_level . '. The tone of voice should be ' . $tone . '. Do not write translations.';


		foreach ($input->all() as $name => $inpVal) {
            if ($name != '_token' && $name != 'project_id' && $name != 'max_tokens') {
                $name = '{' . $name . '}';
                if (!is_null($inpVal) && !is_null($name)) {
                    $prompt = str_replace($name, $inpVal, $prompt);
                } else {
                    $data = [
                        'status'  => 400,
                        'success' => false,
                        'message' => localize('Your input does not match with the custom prompt'),
                    ];
                    return $data;
                }
            }
        } 
       
		$result = $client->completions()->create([
			"model" => $setting->openaimodel,
			"temperature" => floatval($temperature_value),
			"top_p" => floatval($top_p_value),
			"frequency_penalty" => floatval($frequency_penalty_value),
			"presence_penalty" => floatval($presence_penalty_value),
			'max_tokens' => $max_result_length_value,
			'prompt' => $prompt,
		]);
	
		$content = trim($result['choices'][0]['text']);

		// return view('backend.custom_template.template_view', compact('title', 'content'));
		return $content;
	}

	public function BlogGenerate(){
		$title = '';
		$content = '';
        return view('backend.openai.blog_generate', compact('title', 'content'));
    }
	
}
