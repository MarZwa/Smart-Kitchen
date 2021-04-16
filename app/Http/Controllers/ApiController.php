<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductUsage;
use DB;

use App\Models\Grocery;
use App\Models\Storage;

class ApiController extends Controller
{
    public function getUser($id){
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "Gebruiker niet gevonden"
            ], 404);
          }
    }

    public function getUserRFID($rfid){
      if (User::where('rfid', $rfid)->exists()) {
          $user = User::where('rfid', $rfid)->get()->toJson(JSON_PRETTY_PRINT);
          return response($user, 200);
        } else {
          return response()->json([
            "message" => "Gebruiker niet gevonden"
          ], 404);
        }
  }

    public function getProduct($id){
      if (ProductUsage::where('id', $id)->exists()) {
          $product = ProductUsage::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($product, 200);
        } else {
          return response()->json([
            "message" => "Gebruiker niet gevonden"
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


    public function create(Request $request){
      $product = new ProductUsage;
      $rfid = $request->rfid;
      $product->name = $request->name;
      $product->user_name = $request->user_name;
      $product->calories = $request->calories;
      $product->alcohol = $request->alcohol;
      $product->date = $request->date;

      $profile = User::where('rfid', $rfid)->first();
      $calories = $profile->current_calories;
      $alcohol = $profile->current_alcohol;

      DB::table('users')->where('rfid', $rfid)->update([
        'current_calories' => $calories + $product->calories,
        'current_alcohol' => $alcohol + $product->alcohol,
      ]);

      $product->save();

      return response()->json([
          "message" => "Product record toegevoegd"
      ], 201);
    }

      
    public function getAllGroceryProducts() {
        $groceries = Grocery::all()->toJson(JSON_PRETTY_PRINT);
        return response($groceries, 200);
    }

    public function getAllStorageProducts() {
        $storage = Storage::all()->toJson(JSON_PRETTY_PRINT);
        return response($storage, 200);
    }

    public function createGrocery(Request $request) {
        $grocery = new Grocery;
        $grocery->empty_product_name = $request->product_name;
        $grocery->empty_user_name = $request->user_name;
        $grocery->save();

        return response()->json([
            "message" => "grocery record created"
        ], 201);

    }

    public function createStorage(Request $request) {
        $storage = new Storage;
        $storage->add_product_name = $request->product_name;
        $storage->add_user_name = $request->user_name;
        $storage->save();

        return response()->json([
            "message" => "storage record created"
        ], 201);

    }
}
