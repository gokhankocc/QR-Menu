<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Portfolio;
use App\Models\Admin\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Services::all();
        return view('admin.pages.services.index',compact('services'));
    }


    public function create()
    {
        return view('admin.pages.services.create');
    }


    public function store(Request $request)
    {

        //dd($request->all());
        $services = new Services();
        $services->setTranslations('name',$request->name);
        $services->setTranslations('text',$request->text);

        /*$slugs = [];
        foreach ($request->name as $locale => $name) {
            $slugs[$locale] = Str::slug($name.'-'.rand(100, 10000), '-');
        }
        $services->setTranslations('slug', $slugs);*/
        $slugs = [];
        foreach ($request->name as $locale => $name) {
            $slug = Str::slug($name, '-');

            $existingBlog = Services::whereRaw("JSON_EXTRACT(slug, '$.\"{$locale}\"') = '{$slug}'")
                ->first();
            if ($existingBlog) {
                return back()->withErrors(['name' => 'Bu isimde bir Service yazısı zaten mevcut. Lütfen farklı bir isim seçin.']);
            }

            $slugs[$locale] = $slug;
        }
        $services->setTranslations('slug', $slugs);

        //$saved = $services->save();

        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->name["tr"], '-');
            $image= $request->file('image')->storeAs('services', $fileName . '.webp','public2');
            $services->image = $image;
        }

        //SEO
        $services->setTranslations('meta_title',$request->meta_title);
        $services->setTranslations('meta_og_title',$request->meta_og_title);
        $services->setTranslations('meta_description',$request->meta_description);
        $services->setTranslations('meta_og_url',$request->meta_og_url);
        $services->setTranslations('meta_og_image',$request->meta_og_image);
        $services->setTranslations('meta_og_type',$request->meta_og_type);
        $services->setTranslations('meta_canonical',$request->meta_canonical);
        $services->setTranslations('meta_keywords',$request->meta_keywords);
        $services->setTranslations('meta_author',$request->meta_author);
        $services->setTranslations('meta_og_description',$request->meta_og_description);

        $saved= $services->save();

        if ($saved) {
            return redirect()->route('admin.services.index')->with('success', 'Services başarıyla eklendi');
        }
        return back()->with('error', 'Services eklenirken bir problem oluştu lütfen tekrar deneyiniz');
    }

    public function edit($id)
    {
        $services = Services::find($id);
        return view('admin.pages.services.edit', compact('services'));
    }

    public function update(Request $request, $id)
    {
        $services = Services::where('id',$id)->first();

        $services->setTranslations('name',$request->name);
        $services->setTranslations('text',$request->text);

        /*$slugs = [];
        foreach ($request->name as $locale => $name) {
            $slugs[$locale] = Str::slug($name.'-'.rand(100, 10000), '-');
        }
        $services->setTranslations('slug', $slugs);*/
        $slugs = [];
        foreach ($request->name as $locale => $name) {
            $slug = Str::slug($name, '-');

            $existingBlog = Services::whereRaw("JSON_EXTRACT(slug, '$.\"{$locale}\"') = '{$slug}'")
                ->where('id', '!=', $id)
                ->first();
            if ($existingBlog) {
                return back()->withErrors(['name' => 'Bu isimde bir Service yazısı zaten mevcut. Lütfen farklı bir isim seçin.']);
            }

            $slugs[$locale] = $slug;
        }
        $services->setTranslations('slug', $slugs);

        if ($request->hasFile('image')) {
            $deleted = Storage::disk('public2')->delete($services->image);
            $fileName = Str::slug($request->name["tr"], '-');
            $image= $request->file('image')->storeAs('services', $fileName . '.webp','public2');
            $services->image = $image;
        }

        //SEO
        $services->setTranslations('meta_title',$request->meta_title);
        $services->setTranslations('meta_og_title',$request->meta_og_title);
        $services->setTranslations('meta_description',$request->meta_description);
        $services->setTranslations('meta_og_url',$request->meta_og_url);
        $services->setTranslations('meta_og_image',$request->meta_og_image);
        $services->setTranslations('meta_og_type',$request->meta_og_type);
        $services->setTranslations('meta_canonical',$request->meta_canonical);
        $services->setTranslations('meta_keywords',$request->meta_keywords);
        $services->setTranslations('meta_author',$request->meta_author);
        $services->setTranslations('meta_og_description',$request->meta_og_description);

        $saved= $services->update();

        if ($saved) {
            return redirect()->route('admin.services.index')->with('success', 'Hizmet Başarıyla Güncellendi');
        } else {
            return back()->with('erorr', 'Güncelleme işlemi yapılırken,hata oluştu lütfen tekrar deneyiniz!');
        }
    }

    public function destroy($id)
    {
        $services = Services::find($id);
        $services->delete();
        if ($services) {
            return back()->with('success', 'Hizmet başarıyla silindi.');
        }
        return back()->with('error', 'Bir hata oluştu.');
    }
}
