<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    public $table = 'category';
    protected $fillable = ['name','slug'];

    public static function boot()
	{
	    parent::boot();

        static::creating(function($query) {
            $slug = Str::slug($query->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $query->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function ($query) {

            $slug = Str::slug($query->name);
            $count = static::where('id','<>',$query->id)->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $query->slug = $count ? "{$slug}-{$count}" : $slug;

	    });
	}

}
