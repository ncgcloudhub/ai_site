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
		

		// if ($input->title == null) {
		// 	return 10;
		// }

		// $title = $input->title;
		// $main_points = $input->main_points;
		$tone = 'professional';
		$max_tokens = 100;
		
		$apiKey = config('app.openai_api_key');
		$client = OpenAI::client($apiKey);
		

		if($input->max_result_length != NULL){
			$max_tokens = intval($input->max_result_length); 
		}

		if($input->tone != NULL){
			$tone = $input->tone; 
		}
		

		$prompt =  $input->prompt;

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
			"temperature" => 0.7,
			"top_p" => 1,
			"frequency_penalty" => 0,
			"presence_penalty" => 0,
			'max_tokens' => $max_tokens,
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
