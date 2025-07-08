<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Services extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = [
        'name',
        'text',
        'slug',
        'meta_title',
        'meta_og_title',
        'meta_description',
        'meta_og_url',
        'meta_og_image',
        'meta_og_type',
        'meta_canonical',
        'meta_keywords',
        'meta_author',
        'meta_og_description',
        ];

   protected $table = 'services';
}
