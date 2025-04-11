<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sensors() {
        return $this->hasMany(Sensor::class);
    }

    // protected $fillable = [
    //     'site_name',
    //     'user_id',
    // ];
}
