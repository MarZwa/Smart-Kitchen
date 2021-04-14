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

    protected function showDailyFoods($name) {
        $foods = \App\Models\Foods::all()->first();
        $user = \App\Models\Users::find($name);

        return view('foodsDaily', ['foods' => $foods, 'user' => $user]);
    }

    protected function showWeeklyFoods($name) {
        $foods = \App\Models\Foods::all()->first();
        $user = \App\Models\Users::find($name);

        return view('foodsWeekly', ['foods' => $foods, 'user' => $user]);
    }
}
