<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Shelf;
use \App\Models\Grocery;
use \App\Models\Storage;

class ShelfController extends Controller
{
    public function index() {
        return view('users.index', [
            'users' => Shelf::all(),
        ]);
    }


    public function show($id) {
        return view('users.show', [
            'user' => Shelf::find($id),
        ]);
    }
}
