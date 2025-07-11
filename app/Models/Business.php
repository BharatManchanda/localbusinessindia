<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\{HasSlug, SlugOptions};
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Business extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'category_id',
        'sub_category_id',
        'city',
        'business_address',
        'website',
        'instagram_url',
        'facebook_url',
        'status',
        'password',
        'aboutus',
    ];

    public function getSlugOptions() : SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function subCategory() {
        return $this->hasOne(Category::class, 'id', 'sub_category_id');
    }

    public function media() {
        return $this->morphOne(Media::class, 'mediaable');
        // return $this->morphMany(Media::class, 'mediaable');
    }
}
