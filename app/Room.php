<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Room extends Model
{
    use HasSlug;
    protected $fillable=['title', 'slug'];

    public function getSlugOptionS(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsto('slug')
            ->allowDuplicateSlugs();
    }
}
