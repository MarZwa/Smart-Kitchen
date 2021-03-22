<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfvalController extends Controller
{
    public function sorteren(){
        return view('afval.index',[
            'afval' => \App\Models\Afval::all(),
        ]);
    }
}
