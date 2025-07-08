<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Product extends Model
{
    use HasFactory,HasTranslations;

    public $translatable  = [
        'title',
        'text',
        'slug',
        'meta_title',
        'meta_og_title',
        'meta_description',
        'meta_og_url',
        'meta_og_type',
        'meta_canonical',
        'meta_keywords',
        'meta_author',
        'meta_og_description',
    ];

    protected $table = 'products';

    public function category()
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }
}
