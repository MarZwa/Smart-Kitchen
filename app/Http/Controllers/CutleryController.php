<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutleryController extends Controller
{
    protected function show() {
        return view('cutlery.cutlery', ['cutlery' => \App\Models\Cutlery::all()]);
    }

    protected function update() {
        $cutlery = \App\Models\Cutlery::all();

        foreach($cutlery as $cutlery) {
            $cutlery->scanned = false;
            $cutlery->save();
        }

        return redirect('/cutlery');
    }
}
