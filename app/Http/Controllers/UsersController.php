<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    public function index(){
        return view('users.index', [
            'users' => Users::all(),
        ]);
    }

    public function show($id){
        return view('users.show', [
            'users' => Users::find($id),
        ]);
    }

    public function showUsage($id){
        return view('users.products', [
            'products' => Users::find($id)->allProducts,
        ]);
    }
}
