<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('created_at','desc')->get();

        return view('admin.pages.blogs.index', compact('blogs'));

    }

    public function create()
    {
        return view('admin.pages.blogs.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $blog = new Blog();

        /*$slugs = [];
        foreach ($request->name as $locale => $name) {
            $slugs[$locale] = Str::slug($name, '-');
        }
        $blog->setTranslations('slug',$slugs);*/

        $slugs = [];
        foreach ($request->name as $locale => $name) {
            $slug = Str::slug($name, '-');

            $existingBlog = Blog::whereRaw("JSON_EXTRACT(slug, '$.\"{$locale}\"') = '{$slug}'")
                ->first();
            if ($existingBlog) {
                return back()->withErrors(['name' => 'Bu isimde bir blog yazısı zaten mevcut. Lütfen farklı bir isim seçin.']);
            }

            $slugs[$locale] = $slug;
        }
        $blog->setTranslations('slug', $slugs);

        $blog->setTranslations('name',$request->name);
        $blog->setTranslations('details',$request->details);

        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->name["tr"], '-');
            $image = $request->file('image')->storeAs('blogs', $fileName . '.webp','public2');
            $blog->meta_og_image = $image;
            $blog->image = $image;
        }

        //SEO
        $blog->setTranslations('meta_title',$request->meta_title);
        $blog->setTranslations('meta_og_title',$request->meta_og_title);
        $blog->setTranslations('meta_description',$request->meta_description);
        $blog->setTranslations('meta_og_url',$request->meta_og_url);
//        $blog->setTranslations('meta_og_image',$request->meta_og_image);
        $blog->setTranslations('meta_og_type',$request->meta_og_type);
        $blog->setTranslations('meta_canonical',$request->meta_canonical);
        $blog->setTranslations('meta_keywords',$request->meta_keywords);
        $blog->setTranslations('meta_author',$request->meta_author);
        $blog->setTranslations('meta_og_description',$request->meta_og_description);

        $saved= $blog->save();

        if ($saved) {
            return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla eklendi');
        }
        return back()->with('error', 'Blog eklenirken bir problem oluştu lütfen tekrar deneyiniz');
    }


    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.pages.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $slugs = [];
        foreach ($request->name as $locale => $name) {
            $slug = Str::slug($name, '-');

            $existingBlog = Blog::whereRaw("JSON_EXTRACT(slug, '$.\"{$locale}\"') = '{$slug}'")
                ->where('id', '!=', $id)
                ->first();
            if ($existingBlog) {
                return back()->withErrors(['name' => 'Bu isimde bir blog yazısı zaten mevcut. Lütfen farklı bir isim seçin.']);
            }

            $slugs[$locale] = $slug;
        }
        $blog->setTranslations('slug', $slugs);

        $blog->setTranslations('name',$request->name);
        $blog->setTranslations('details',$request->details);

        if ($request->hasFile('image')) {
            if (isset($blog->image)){
                $deleted = Storage::disk('public2')->delete($blog->image);
            }
            $fileName = Str::slug($request->name["tr"], '-');
            $image = $request->file('image')->storeAs('blogs', $fileName . '.webp','public2');
//            $imagePath = str_replace('\/', '/', $image);
            $blog->meta_og_image = $image;
            $blog->image = $image;
        }else{
            if (!isset($blog->meta_og_image)){
                $blog->meta_og_image = $blog->image;
            }
        }

        //SEO
        $blog->setTranslations('meta_title',$request->meta_title);
        $blog->setTranslations('meta_og_title',$request->meta_og_title);
        $blog->setTranslations('meta_description',$request->meta_description);
        $blog->setTranslations('meta_og_url',$request->meta_og_url);
        $blog->setTranslations('meta_og_type',$request->meta_og_type);
        $blog->setTranslations('meta_canonical',$request->meta_canonical);
        $blog->setTranslations('meta_keywords',$request->meta_keywords);
        $blog->setTranslations('meta_author',$request->meta_author);
        $blog->setTranslations('meta_og_description',$request->meta_og_description);

        $saved= $blog->update();

        if ($saved) {
            return redirect()->route('admin.blogs.index')->with('success', 'Başarıyla Güncellendi');
        } else {
            return back()->with('erorr', 'Güncelleme işlemi yapılırken,hata oluştu lütfen tekrar deneyiniz!');
        }
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        if ($blog) {
            return back()->with('success', 'Blog başarıyla silindi.');
        }
        return back()->with('error', 'Bir hata oluştu.');
    }
}
