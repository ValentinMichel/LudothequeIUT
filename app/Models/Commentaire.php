<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';

    function jeux() {
        return $this->belongsTo(Jeux::class);
    }
    function user() {
        return $this->belongsTo(User::class);
    }
}
