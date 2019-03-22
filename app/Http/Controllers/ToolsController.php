<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ToolsController extends Controller
{   

    public function mailChecker()
    {
        return view('vadmin.tools.mail-checker');
    }

}
