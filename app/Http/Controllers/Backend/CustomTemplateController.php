<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomTemplate;
use App\Models\CustomTemplateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CustomTemplateController extends Controller
{
    public function CustomTemplateAdd(){
        $categories = CustomTemplateCategory::latest()->get();
        return view('backend.custom_template.template_add', compact('categories'));
    }

    public function CustomTemplateManage(){
        $templates = CustomTemplate::latest()->get();
        $customtemplatecategories = CustomTemplateCategory::latest()->get();
        return view('backend.custom_template.template_manage', compact('templates','customtemplatecategories'));
    }

    public function CustomTemplateView($id) {
        $customTemplate = CustomTemplate::findOrFail($id);
    
        // Convert JSON strings to arrays
        $inputTypes = json_decode($customTemplate->input_types, true);
        $inputNames = json_decode($customTemplate->input_names, true);
        $inputLabels = json_decode($customTemplate->input_labels, true);
    
        $content = '';
        
    
        return view('backend.custom_template.template_view', compact('customTemplate', 'inputTypes', 'inputNames', 'inputLabels', 'content'));
    }



    public function CustomTemplateStore (Request $request){

        // Validate the incoming request
        $validatedData = $request->validate([
            'template_name' => 'required|string',
            'icon' => 'nullable|string',
            'category_id' => 'required|exists:custom_template_categories,id',
            'description' => 'nullable|string',
            'input_types' => 'required|array',
            'input_names' => 'required|array',
            'input_labels' => 'required|array',
            'prompt' => 'nullable|string',
        ]);

        $slug = Str::slug($validatedData['template_name']);

        $templateInput = new CustomTemplate();
        $templateInput->template_name = $validatedData['template_name'];
        $templateInput->slug = $slug;
        $templateInput->icon = $validatedData['icon'];
        $templateInput->category_id = $validatedData['category_id'];
        $templateInput->description = $validatedData['description'];
        $templateInput->input_types = json_encode($validatedData['input_types']);
        $templateInput->input_names = json_encode($validatedData['input_names']);
        $templateInput->input_labels = json_encode($validatedData['input_labels']);
        $templateInput->prompt = $validatedData['prompt'];
        $templateInput->total_word_generated = '0';

        // Save the TemplateInput instance
        $templateInput->save();
  
  
         $notification = array(
              'message' => 'Settings Changed Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->back()->with($notification);
  
      }
}
