<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $arr = ['my' => 'hello'];

        return view('home', $arr);
    }

    public function see()
    {
        $fetch = Profile::find(1);
        $f = $fetch->bill->where('quantity', '<', 1);
        $p = Bill::where('profile_id', 1)->where('quantity', '=>', 0)->get();
        //    echo $p;
        echo '<br>';
        echo $fetch;

//        return view('fetch',$arr);
    }
}
