<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function films() {
        return $this->belongsToMany("App\Models\Film");
    }
}
