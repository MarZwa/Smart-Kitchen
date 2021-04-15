<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    use HasFactory;

    public function cleaninglog(){
        return $this->belongsTo("cleaning_log", "name", "task_name");
    }
    
}
