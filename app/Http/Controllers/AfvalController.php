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
            'user_rest' => \App\Models\Users::orderBy('rest', 'desc')->first(),
            'user_plastic' => \App\Models\Users::orderBy('plastic', 'desc')->first(),
            'user_gft' => \App\Models\Users::orderBy('gft', 'desc')->first(),
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
