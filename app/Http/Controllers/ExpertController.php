<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function ExpertAdd(){
        $experts = Expert::latest()->get();
        return view('backend.expert.expert_add', compact('experts'));
    }
}
