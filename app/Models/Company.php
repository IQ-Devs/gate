<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Keygen\Keygen;

class Company extends Model
{
    protected $table = 'companys';

    //
    public function profile()
    {
        return $this->belongsTo(\App\Models\Profile::class);
    }
//    protected static function boot() {
//        parent::boot();
//        Company::creating(function ($model) {
//            $id= Keygen::numeric(8)->generate();
//
//            while (Company::where('token',$id)->count() > 0) {
//                $id =$id;
//            }
//
//            $model->token = $id;
//
//        });
//    } need for fixing
}
