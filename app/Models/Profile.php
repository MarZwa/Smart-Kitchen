<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductUsage;

class Profile extends Model
{
    protected $table = 'profile';

    public function allProducts(){
        return $this->hasMany(ProductUsage::class, 'profile_name', 'name');
    }
}
