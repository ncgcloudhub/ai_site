<?php

namespace App\Http\Controllers;

use App\Models\CustomTemplateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CustomCategoryTemplateController extends Controller
{
    public function CustomCategoryTemplateAdd(){
        $categories = CustomTemplateCategory::latest()->get();
        return view('backend.custom_template.category', compact('categories'));
    }

    public function CustomCategoryTemplateStore (Request $request){


        $customTemplateCategory = CustomTemplateCategory::insertGetId([
            
          'category_name' => $request->category_name,
          'category_icon' => $request->category_icon,
          'created_at' => Carbon::now(),   
  
        ]);
  
  
         $notification = array(
              'message' => 'Settings Changed Successfully',
              'alert-type' => 'success'
          );
  
          // return redirect()->route('manage-product')->with($notification);
          return redirect()->back()->with($notification);
  
      } // end method
}
