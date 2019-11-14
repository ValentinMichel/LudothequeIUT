<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeux extends Model
{
    protected $table = 'jeux';
    function comments() {
        return $this->hasMany(Commentaire::class);
    }
    function tags() {
        return $this->belongsToMany(Tag::class);
    }

}
