<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    //
    protected $table = "portfolio_image";

    protected $fillable = [
        "portfolio_id",
        "image",
    ];
}
