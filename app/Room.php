<?php

namespace App;

use App\Messages;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }
}
