<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'sites', 'sitename', 'user_email', 'sitename', 'email')
        ->withPivot('user_name', 'user_email')
        ->withTimestamps();
    }
}
