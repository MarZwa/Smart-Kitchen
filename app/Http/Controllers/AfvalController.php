<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfvalController extends Controller
{
    public function sorteren(){
        return view('afval.index',[
            'afval_naam' => \App\Models\Afval::all('naam'),
            'status' => \App\Models\StatusBak::all()->first(),
            'vol_rest' => \App\Models\VolheidBakken::all()->first(),
            'vol_plastic' => \App\Models\VolheidBakken::where('bak', 'Plastic')->get()->first(),
            'vol_gft' => \App\Models\VolheidBakken::where('bak', 'Gft')->get()->first(),
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
