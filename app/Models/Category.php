<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        "parent_id",
        "title",
        "slug",
        "icon",
        "status",
        "is_visible_on_home",
    ];

    // Define a recursive relationship
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function media() {
        return $this->morphOne(Media::class, 'mediaable');
        // return $this->morphMany(Media::class, 'mediaable');
    }

}
