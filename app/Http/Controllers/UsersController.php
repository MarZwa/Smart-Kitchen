<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected function showFoods($name) {
        $foods = \App\Models\Foods::all()->first();
        $user = \App\Models\Users::find($name);

        return view('foods', ['foods' => $foods, 'user' => $user]);
    }
}
