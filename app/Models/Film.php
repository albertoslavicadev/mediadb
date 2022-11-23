<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public function actors() {
        return $this->belongsToMany("App\Models\Actor");
    }
    public function genres() {
        return $this->belongsToMany("App\Models\Genre");
    }
    public function tags() {
        return $this->belongsToMany("App\Models\Tag");
    }
}
