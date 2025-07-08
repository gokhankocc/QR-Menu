<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::where('branch_id',auth('admin')->user()->current_branch)->select('id', 'name','parent_category_id','image','rank')->get();
        /*$categories = Category::with('subCategories.subCategories.subCategories')
            ->where('parent_category_id',0) // Ana kategorileri almak için
            ->get();
        dd($categories);*/

        return view('admin.pages.categories.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name','parent_category_id')->get();
        return view('admin.pages.categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->branch_id = auth('admin')->user()->current_branch;
        $category->parent_category_id = $request->parent_category_id;
        $category->rank = $request->rank;
        $category->setTranslations('name',$request->name);

        $slugs = [];
        foreach ($request->name as $locale => $name) {
            $slug = Str::slug($name, '-');

            $existingCategory = Category::whereRaw("JSON_EXTRACT(slug, '$.\"{$locale}\"') = '{$slug}'")
                ->first();
            if ($existingCategory) {
                return back()->withErrors(['name' => 'Bu isimde bir Kategori zaten mevcut. Lütfen farklı bir isim seçin.']);
            }

            $slugs[$locale] = $slug;
        }
        $category->setTranslations('slug', $slugs);

        if ($request->hasFile('image')) {
            /*$fileName = '/categories';
            $path = $request->file('image')->store($fileName, 'public2');
            $category->image  = '/storage/' . $path;
            $category->meta_og_image = $path;*/

            $fileName = Str::slug($request->name["tr"], '-');
            $image = $request->file('image')->storeAs('categories', $fileName . '.webp','public2');
            $category->meta_og_image = $image;
            $category->image = $image;
        }

        //SEO
       /* $category->setTranslations('meta_title',$request->meta_title);
        $category->setTranslations('meta_og_title',$request->meta_og_title);
        $category->setTranslations('meta_description',$request->meta_description);
        $category->setTranslations('meta_og_url',$request->meta_og_url);
//        $blog->setTranslations('meta_og_image',$request->meta_og_image);
        $category->setTranslations('meta_og_type',$request->meta_og_type);
        $category->setTranslations('meta_canonical',$request->meta_canonical);
        $category->setTranslations('meta_keywords',$request->meta_keywords);
        $category->setTranslations('meta_author',$request->meta_author);
        $category->setTranslations('meta_og_description',$request->meta_og_description);*/

        $category->save();
        if($category)
            return redirect()->route('admin.categories.create')->with('success','Başarıyla Eklendi');
        else
            return back()->with('error','Eklenirken Hata Oluştu');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        //dd($id);
        $categories = Category::where('id','!=',$id)->select('id', 'name','parent_category_id')->get();
        $category= Category::find($id);
        return view('admin.pages.categories.edit',compact('category','categories'));
    }

    public function update(Request $request, $id)
    {
        $category= Category::find($id);
        $category->branch_id = auth('admin')->user()->current_branch;
        $category->parent_category_id = $request->parent_category_id;
        $category->rank = $request->rank;
        $category->setTranslations('name',$request->name);

        $slugs = [];
        foreach ($request->name as $locale => $name) {
            $slug = Str::slug($name, '-');

            $existingCategory = Category::whereRaw("JSON_EXTRACT(slug, '$.\"{$locale}\"') = '{$slug}'")
                ->where('id', '!=', $id)
                ->first();
            if ($existingCategory) {
                return back()->withErrors(['name' => 'Bu isimde bir Kategori zaten mevcut. Lütfen farklı bir isim seçin.']);
            }

            $slugs[$locale] = $slug;
        }
        $category->setTranslations('slug', $slugs);
        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->name["tr"], '-');
            $image = $request->file('image')->storeAs('categories', $fileName . '.webp','public2');
            $category->meta_og_image = $image;
            $category->image = $image;
        }

        //SEO
       /* $category->setTranslations('meta_title',$request->meta_title);
        $category->setTranslations('meta_og_title',$request->meta_og_title);
        $category->setTranslations('meta_description',$request->meta_description);
        $category->setTranslations('meta_og_url',$request->meta_og_url);
//        $blog->setTranslations('meta_og_image',$request->meta_og_image);
        $category->setTranslations('meta_og_type',$request->meta_og_type);
        $category->setTranslations('meta_canonical',$request->meta_canonical);
        $category->setTranslations('meta_keywords',$request->meta_keywords);
        $category->setTranslations('meta_author',$request->meta_author);
        $category->setTranslations('meta_og_description',$request->meta_og_description);*/

        $category->update();

        if($category)
            return redirect()->route('admin.categories.index')->with('success','Başarıyla Güncellendi');
        else
            return back()->with('error','Güncellenirken Hata Oluştu');
    }

    public function destroy($id)
    {
        $category= Category::find($id);
        $category->delete();
        if ($category){
            return back()->with('success','Kategori silindi.');
        }else{
            return back()->with('error','Bir hata oluştu.');
        }
    }
}
