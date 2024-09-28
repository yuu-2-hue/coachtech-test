<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function index()
    {
        return view('confirm');
    }

    public function retouch(Request $request)
    {
        if($request->input('back') == 'back')
        {
            return redirect('/')->withInput();
        }
        return view('thanks');
    }
}
