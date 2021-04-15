<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CleaningLog;

class CleaningLogController extends Controller
{
    public function index(){
        $latestEntry = \App\Models\CleaningLog::with('task', 'user')->latest('started_at')->first();
        $latestEntryTask = $latestEntry['task'];
        $latestEntryUser = $latestEntry['user'];
        return view('cleaning.index',[
            'latestEntry' => $latestEntry,
            'latestEntryTask' => $latestEntryTask,
            'latestEntryUser' => $latestEntryUser,
        ]); 
    }
}
