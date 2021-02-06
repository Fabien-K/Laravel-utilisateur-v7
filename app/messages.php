<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function room()
    {
        return $this->belongsTo(User::class);
    }
}