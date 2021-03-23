<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfvalController extends Controller
{
    public function sorteren(){
        return view('afval.index',[
            'afval_naam' => \App\Models\Afval::all('naam'),
            'status' => \App\Models\StatusBak::all()->first(),
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
