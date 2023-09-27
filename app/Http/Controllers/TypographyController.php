<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypographyController extends Controller
{
    public function index()
    {
        return view('typography.index');
    }

}


