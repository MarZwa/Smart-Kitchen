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

    public function statusUpdate($naam){
        $status = \App\Models\StatusBak::all()->first();
        $bak = \App\Models\Afval::where('naam', $naam)->get();
        
        $status->status = $bak[0]->bak;
        $status->save();
        return redirect("/");
    }
}
