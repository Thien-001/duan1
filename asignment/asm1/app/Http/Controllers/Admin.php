<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function dasboard()
    {
        return view('dasboard');
    }
}
