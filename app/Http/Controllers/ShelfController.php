<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Grocery;
use \App\Models\Storage;

class UsersController extends Controller
{
    public function index() {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }


    public function show($id) {
        return view('users.show', [
            'user' => User::find($id),
        ]);
    }
}
