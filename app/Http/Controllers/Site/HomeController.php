<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Services;
use App\Models\Admin\Slider;
use App\Models\Site\About;
use App\Models\Site\BlogCategory;
use App\Models\Site\Blog;

class HomeController extends Controller
{

    public function index()
    {
        //dd(auth('user')->user());
        $logo = null;
        $branches = Branch::all();
        $sliders = Slider::all();
        $meta_title = "Cajun Corner";
        $meta_og_title = null;
        $meta_description = null;
        $meta_og_url = null;
        $meta_og_image = null;
        $meta_og_type = null;
        $meta_canonical = null;
        $meta_keywords = null;
        $meta_author = null;
        $meta_og_description = null;

        return view('site.pages.index',compact(
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
            'branches',
            'sliders',
            'logo',

        ));
    }

    public function branchSelect($id){
        //dd($id);
        $logo = Branch::find($id)->logo;
        $sliders = Slider::all();
        $categories = Category::where('branch_id',$id)->orderby('rank','asc')->get();

        $meta_title = "Cajun Corner";
        $meta_og_title = null;
        $meta_description = null;
        $meta_og_url = null;
        $meta_og_image = null;
        $meta_og_type = null;
        $meta_canonical = null;
        $meta_keywords = null;
        $meta_author = null;
        $meta_og_description = null;

        if (isset($categories[0])){
            return view('site.pages.category.index',compact(
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
                'categories',
                'sliders',
                'logo',

            ));
        }
        else{
            $category = null;
            $logo = Branch::find($id)->logo;
            $products = Product::where('branch_id',$id)->orderby('rank','asc')->get();

            return view('site.pages.category.detail',compact(
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
                'category',
                'products',
                'logo',

            ));
        }

    }

    public function categorySelect($id)
    {
        //dd(auth('user')->user());
        $category = Category::where('id',$id)->first();
        $logo = Branch::find($category->branch_id)->logo;
        $products = Product::where('category_id',$category->id)->orderby('rank','asc')->get();
        $meta_title = "Cajun";
        $meta_og_title = null;
        $meta_description = null;
        $meta_og_url = null;
        $meta_og_image = null;
        $meta_og_type = null;
        $meta_canonical = null;
        $meta_keywords = null;
        $meta_author = null;
        $meta_og_description = null;

        return view('site.pages.category.detail',compact(
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
            'category',
            'products',
            'logo',

        ));
    }

}
