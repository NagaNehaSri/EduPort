<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerWithUs extends Model
{
    use HasFactory;
    protected $table = "partner_with_us";

    protected $fillable = [
        'tag',
        'heading',
        'description',
        'description_2',

        'image',
     
       
        
    ];
}
