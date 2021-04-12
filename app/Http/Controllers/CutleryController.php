<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutleryController extends Controller
{
    protected function show() {
        return view('cutlery', ['cutlery' => \App\Models\Cutlery::all()]);
    }

    protected function update() {
        $cutlery = \App\Models\Cutlery::all();
        
        foreach($cutlery as $huts) {
            $huts->scanned = false;
            $huts->save();
        }

        return redirect('/cutlery');
    }
}
