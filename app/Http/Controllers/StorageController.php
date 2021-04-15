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

    public function storage() {
        return view('storage.storagelist', [
            'user' => Shelf::all(),
            'storage' => Storage::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function destroyStorage(Request $request, $id) {
        $id = $id;

        DB::table('storage')->where('id', $id)->delete();

        return redirect('/storagelist');
    }
}
