<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelf;
use App\Models\Grocery;
use App\Models\Storage;

class ApiController extends Controller
{
    public function getAllUsers() {
        $users = Shelf::all()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function getUser($id){
        if (Shelf::where('id', $id)->exists()) {
            $user = Shelf::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "Gebruiker nie gevonde he nutjob die je bent!@#$%"
            ], 404);
          }
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

    public function getUserRFID($rfid){
        if (Shelf::where('rfid', $rfid)->exists()) {
            $user = Shelf::where('rfid', $rfid)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "Gebruiker niet gevonden"
            ], 404);
          }
    }
}
