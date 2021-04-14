<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;
use DB;

class StorageController extends Controller
{
    public function storeStorage(Request $request, Storage $storage) {
        $storage->add_product_name = $request->input('productname');
        $storage->add_user_name = $request->input('username');

        try {
            $storage->save();
            return redirect('/storagelist');
        }
        catch(Exception $e) {
            return redirect('/storagelist');
        }
    }

    public function destroyStorage(Request $request, $id) {
        // dd($request);
        $id = $id;

        DB::table('storage')->where('id', $id)->delete();

        return redirect('/storagelist');
    }
}
