<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index(){
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    public function show($id){
        return view('users.show', [
            'user' => User::find($id),
            'products' => User::find($id)->allProducts->last()->take(6)->where('date', Carbon::now()->format('d-m-Y'))->get(),
        ]);
    }

    public function showUsage($id){
        return view('users.products', [
            'user' => User::find($id),
            'products' => User::find($id)->allProducts,
        ]);
    }
}
