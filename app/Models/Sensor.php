<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public function site() {
        return $this->belongsTo(Site::class);
    }

    public function readings() {
        return $this->hasMany(Reading::class);
    }
}
