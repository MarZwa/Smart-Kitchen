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

    public function grocery() {
        return view('groceries.grocerylist', [
            'user' => Shelf::all(),
            'groceries' => Grocery::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function storage() {
        return view('storage.storagelist', [
            'user' => Shelf::all(),
            'storage' => Storage::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
