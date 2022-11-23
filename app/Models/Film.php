<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Film extends Model
{
    use HasFactory, Rateable;

    public $fillable = ['name_it', 'name_eng', 'release_date', 'trailer'];

    public function actors() {
        return $this->belongsToMany("App\Models\Actor");
    }
    public function genres() {
        return $this->belongsToMany("App\Models\Genre");
    }
    public function tags() {
        return $this->belongsToMany("App\Models\Tag");
    }
    public function rating() {
        return $this->hasMany(Rating::class);
    }
}
