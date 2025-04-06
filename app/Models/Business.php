<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Business extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "slug",
        "email",
        "phone",
        "website",
        "category_id",
        "city",
        "address",
        "links",
        "status",
    ];

    protected $cast = [
        "links" => "array",
    ];
}
