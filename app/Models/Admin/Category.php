<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;
    public $translatable  = [
        'name',
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
    protected $table = "categories";

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function getFullPath()
    {
        $path = '';
        $category = $this;
        while ($category != null) {
            $path = ($category->parent_category_id ? '/' : '') . $category->name . $path;
            $category = $category->parentCategory; // parentCategory, üst kategoriyi döndüren ilişki olmalıdır.
        }
        return $path;
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

}
