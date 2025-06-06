<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Product extends Model
{
    protected $fillable = ['name','price','stock','tumbnail','user_id'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
