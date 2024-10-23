<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIDocumentationController extends Controller
{
    public function index()
    {
        return view('api.documentation');
    }
}
