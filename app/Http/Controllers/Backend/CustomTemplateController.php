<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomTemplateCategory;
use Illuminate\Http\Request;

class CustomTemplateController extends Controller
{
    public function CustomTemplateAdd(){
        $categories = CustomTemplateCategory::latest()->get();
        return view('backend.custom_template.template_add', compact('categories'));
    }
}
