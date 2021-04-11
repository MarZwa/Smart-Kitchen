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

    public function grocery($id) {
        return view('groceries.grocerylist', [
            'user' => Shelf::find($id),
            'groceries' => Grocery::all(),
        ]);
    }

    public function storage($id) {
        return view('groceries.storagelist', [
            'user' => Shelf::find($id),
            'storage' => Storage::all(),
        ]);
    }
}
