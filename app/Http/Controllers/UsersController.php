<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected function showFoods($id) {
        $foods = \App\Models\Foods::all()->first();
        $user = \App\Models\Users::find($id);

        return view('foods', ['foods' => $foods, 'user' => $user]);
    }

    protected function showDailyFoods($id) {
        $foods = \App\Models\Foods::all()->first();
        $user = \App\Models\Users::find($id);

        return view('dailyFoods', ['foods' => $foods, 'user' => $user]);
    }

    protected function showWeeklyFoods($id) {
        $foods = \App\Models\Foods::all()->first();
        $user = \App\Models\Users::find($id);

        return view('weeklyFoods', ['foods' => $foods, 'user' => $user]);
    }
}
