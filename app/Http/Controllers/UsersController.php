<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            'user' => User::find($id),
            'products' => User::find($id)->allProducts->where('date', Carbon::now()->format('d-m-Y'))->take(6),
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
