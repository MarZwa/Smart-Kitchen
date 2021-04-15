<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CleaningLog extends Model
{
    protected $table = 'cleaning_log';
    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'task_name',
        'finished',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $casts = [

    ];

    public function task(){
        return $this->hasMany("App\Models\Task", "name", "task_name");        
    }

    public function user(){
        return $this->hasMany("App\Models\User", "name", "task_name");        

    }

}
