<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function facialInstructions()
    {
        return view('facial-instructions'); // tu blade
    }
}
