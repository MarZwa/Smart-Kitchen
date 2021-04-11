<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductUsage;

class ApiController extends Controller
{
    public function getUser($id){
        if (Users::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "User not found"
            ], 404);
          }
    }

    public function getProduct($id){
      if (ProductUsage::where('id', $id)->exists()) {
          $product = ProductUsage::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($product, 200);
        } else {
          return response()->json([
            "message" => "Product not found"
          ], 404);
        }
    }

    public function getUsers(){
          $users = User::all()->toJson(JSON_PRETTY_PRINT);
          return response($users, 200);
    }

    public function getProducts(){
      $products = ProductUsage::all()->toJson(JSON_PRETTY_PRINT);
      return response($products, 200);
    }
}
