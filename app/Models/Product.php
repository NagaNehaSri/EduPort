<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    protected $fillable = [
        "category_id",
        "product_name",
        "product_short_description",
        "short_description",
        "description",
        "description2",
        "thumbnail_image",
        "view_image",
        "status",
        "slug",
        "priority",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
