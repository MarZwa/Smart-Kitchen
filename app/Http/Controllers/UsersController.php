<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductUsage;
use Carbon\Carbon;
use DB;

class UsersController extends Controller
{
    public function index(){
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    public function show($id){
        return view('users.show', [
            $name = User::find($id)->name,
            'user' => User::find($id),
            'products' => ProductUsage::orderBy('created_at', 'desc')->take(4)->where('user_name', $name)->get(),
        ]);
    }

    public function showUsage($id){
        return view('users.products', [
            'user' => User::find($id),
            'products' => User::find($id)->allProducts,
        ]);
    }

    public function edit($id){
        return view('users.edit', [
            'user' => User::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $id = $id;
        $calories = $request->calories;
        $alcohol = $request->alcohol;

        DB::table('users')->where('id', $id)->update([
            'calories' => $calories,
            'alcohol' => $alcohol,

        ]);

        return redirect('/users/' . $id);
    }
}
