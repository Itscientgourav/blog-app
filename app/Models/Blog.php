<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'unique_identifier','blog_title', 'blog_img', 'blog_post_date', 'blog_body', 'created_by'
    ];
}
