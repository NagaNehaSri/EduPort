<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table = 'projects';

    protected $fillable = [
        'homepageprojectimage',
        'homepageprojecttitle',
        'homepageprojectheading',
        'project_status',
        'project_title',
        'project_image',
        'slug',
        'project_view_page_description',
        'project_view_page_about_description',
     
    ];

}
