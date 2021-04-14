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
            'products' => ProductUsage::orderBy('created_at', 'desc')->take(4)->where('user_name', $name)->where('date', Carbon::now()->format('d-m-Y'))->get(),
        ]);
    }

    public function showUsage($id){
        return view('users.products', [
            $name = User::find($id)->name,
            'user' => User::find($id),
            'products' => ProductUsage::orderBy('created_at', 'desc')->where('user_name', $name)->get(),
        ]);
    }

    public function edit($id){
        return view('users.edit', [
            'user' => User::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $id = $id;
        $user_name = User::find($id)->name;

        if($request->has('image')){
            $path = $request->file('image')->store('public/images');
        } else {
            $path = User::find($id)->image;
        }
        

        $name = $request->name;
        $rfid = $request->rfid;
        $image = $path;
        $calories = $request->calories;
        $alcohol = $request->alcohol;

        DB::table('product_usage')->where('user_name', $user_name)->update([
            'user_name' => NULL,
        ]);

        DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'rfid' => $rfid,
            'image' => $image,
            'calories' => $calories,
            'alcohol' => $alcohol,
        ]);

        DB::table('product_usage')->where('user_name', NULL)->update([
            'user_name' => $name,
        ]);

        return redirect('/users/' . $id);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request, User $user){
        $user->name = $request->input('name');
        $user->rfid = $request->input('rfid');
        $user->alcohol = $request->input('alcohol');
        $user->calories = $request->input('calories');

        if($request->has('image')){
            $path = $request->file('image')->store('public/images');
        } else {
            $path = '/img/profile-placeholder.png';
        }

        $user->image = $path;

        $user->current_calories = 0;
        $user->current_alcohol = 0;
        
        try{
            $user->save();
            return redirect('/users');
        } catch (Exception $e){
            return redirect('/user/create');
        } 
    }

    public function confirmation($id){
        return view('redirects.redirect-delete', [
            'user' => User::find($id),
        ]);
    }

    public function destroy(Request $request){
        $name = $request->name;

        DB::table('product_usage')->where('user_name', $name)->delete();
        DB::table('users')->where('name', $name)->delete();

        return redirect('/users');
    }
}
