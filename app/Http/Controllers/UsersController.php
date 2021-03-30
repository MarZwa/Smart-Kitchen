<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected function showFoods() {
        $foods = \App\Models\Foods::all()->first();
        $user = \App\Models\Users::find('Marc');

        return view('grid', ['foods' => $foods, 'user' => $user]);
    }
}
