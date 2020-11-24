<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumeBuilderController extends Controller
{
    public function edit()
    {
        $data = [];
        return view("admin.resume-builder.edit", $data);
    }
}
