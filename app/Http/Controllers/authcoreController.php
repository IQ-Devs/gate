<?php

namespace App\Http\Controllers;
use App\Authcore;
use Illuminate\Http\Request;

class authcoreController extends Controller
{
    //

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('can:is_admin');
    }
    public function  index(){
        $records=Authcore::all();

        return view('admin.authcore.index',['records'=>$records]);
    }

    public function create (){




    }

}
