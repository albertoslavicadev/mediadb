<?php

namespace App\Models;

use BeyondCode\Comments\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public $fillable = ['name'];

    public function films() {
        return $this->belongsToMany("App\Models\Film");
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
