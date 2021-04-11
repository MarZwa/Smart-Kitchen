<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Grocery;

class GroceryController extends Controller
{
    public function index() {
        return view('groceries.grocerylist', [
            'groceries' => Grocery::all(),
        ]);
    }
}
