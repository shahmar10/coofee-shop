<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;

    public function basket(){

        return $this->hasMany(Basket::class)->where('session',Session::get('session'));

    }
}
