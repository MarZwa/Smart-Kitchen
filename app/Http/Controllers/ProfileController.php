<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(){
        return view('profiles.index', [
            'profiles' => Profile::all(),
        ]);
    }

    public function show($id){
        return view('profiles.show', [
            'profile' => Profile::find($id),
        ]);
    }

    public function showUsage($id){
        return view('profiles.products', [
            'products' => Profile::find($id)->allProducts,
        ]);
    }
}
