<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Grocery;
use App\Models\User;

class GroceryController extends Controller
{
    public function storeGrocery(Request $request, Grocery $grocery) {
        $grocery->empty_product_name = $request->input('productname');
        $grocery->empty_user_name = $request->input('username');

        try {
            $grocery->save();
            return redirect('/grocerylist');
        }
        catch(Exception $e) {
            return redirect('/grocerylist');
        }
    }

    public function grocery() {
        return view('groceries.grocerylist', [
            'user' => User::all(),
            'groceries' => Grocery::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function destroyGrocery() {
        DB::table('grocery')->truncate();

        return redirect('/grocerylist');
            
    }
}
