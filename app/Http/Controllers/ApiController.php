<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class ApiController extends Controller
{
    public function getUser($id){
        
        if (Users::where('id', $id)->exists()) {
            $user = Users::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "User not found"
            ], 404);
          }
    }
}
