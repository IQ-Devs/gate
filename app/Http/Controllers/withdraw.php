<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class withdraw extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            //
            return  redirect()->route('withdraw.show', $request->input('search'));
        }
        //  echo money(  Profile::sum('balance'),'USD');
        return view('admin.withdraw.index');
    }

    public function show(Profile $id)
    {
        if ($id->company === null) {
            return  abort(403, 'user not found ');
        }

        return view('admin.withdraw.show', ['profiles' => $id]);
    }

    public function process(Profile $id)
    {
        return view('admin.withdraw.show', ['profiles' => $id]);
    }
}
