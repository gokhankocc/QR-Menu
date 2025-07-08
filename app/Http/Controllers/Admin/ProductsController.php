<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::where('branch_id',auth('admin')->user()->current_branch)->orderBy('rank','asc')->get();

        return view('admin.pages.products.index', compact('products'));

    }

    public function create()
    {
        $latestProduct = Product::latest()->first();
        if (isset($latestProduct)){
            $latestProductRank = Product::latest()->first()->rank;
        }
        else{
            $latestProductRank = null;
        }
        $categories = Category::where('branch_id',auth('admin')->user()->current_branch)->select('id', 'name','parent_category_id')->get();
        return view('admin.pages.products.create',compact('categories','latestProductRank','latestProduct'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $product = new Product();

        /*$slugs = [];
        foreach ($request->name as $locale => $name) {
            $slugs[$locale] = Str::slug($name, '-');
        }
        $blog->setTranslations('slug',$slugs);*/

        $slugs = [];
        foreach ($request->title as $locale => $name) {
            $slug = Str::slug($name, '-');

            /*$existingProduct = Product::whereRaw("JSON_EXTRACT(slug, '$.\"{$locale}\"') = '{$slug}'")
                ->first();
            if ($existingProduct) {
                return back()->withErrors(['name' => 'Bu isimde bir Ürün  zaten mevcut. Lütfen farklı bir isim seçin.']);
            }*/

            $slugs[$locale] = $slug;
        }
        $product->category_id = $request->category_id;
        $product->branch_id = auth('admin')->user()->current_branch;
        $product->price = $request->price;
        $product->rank = $request->rank;
        $product->setTranslations('slug', $slugs);

        $product->setTranslations('title',$request->title);
        $product->setTranslations('text',$request->text);

        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->title["tr"], '-');
            $image = $request->file('image')->storeAs('products', $fileName . '.webp','public2');
            $product->meta_og_image = $image;
            $product->image = $image;
        }

        /*//SEO
        $product->setTranslations('meta_title',$request->meta_title);
        $product->setTranslations('meta_og_title',$request->meta_og_title);
        $product->setTranslations('meta_description',$request->meta_description);
        $product->setTranslations('meta_og_url',$request->meta_og_url);
//        $blog->setTranslations('meta_og_image',$request->meta_og_image);
        $product->setTranslations('meta_og_type',$request->meta_og_type);
        $product->setTranslations('meta_canonical',$request->meta_canonical);
        $product->setTranslations('meta_keywords',$request->meta_keywords);
        $product->setTranslations('meta_author',$request->meta_author);
        $product->setTranslations('meta_og_description',$request->meta_og_description);*/

        $saved= $product->save();

        if ($saved) {
            return redirect()->route('admin.products.create')->with('success', 'Ürün başarıyla eklendi');
        }
        return back()->with('error', 'Ürün eklenirken bir problem oluştu lütfen tekrar deneyiniz');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id', 'name','parent_category_id')->get();
        return view('admin.pages.products.edit', compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $slugs = [];
        foreach ($request->title as $locale => $name) {
            $slug = Str::slug($name, '-');

           /* $existingProduct = Product::whereRaw("JSON_EXTRACT(slug, '$.\"{$locale}\"') = '{$slug}'")
                ->where('id', '!=', $id)
                ->first();
            if ($existingProduct) {
                return back()->withErrors(['name' => 'Bu isimde bir Ürün zaten mevcut. Lütfen farklı bir isim seçin.']);
            }*/

            $slugs[$locale] = $slug;
        }
        $product->category_id = $request->category_id;
        $product->branch_id = auth('admin')->user()->current_branch;
        $product->price = $request->price;
        $product->rank = $request->rank;
        $product->setTranslations('slug', $slugs);

        $product->setTranslations('title',$request->title);
        $product->setTranslations('text',$request->text);

        if ($request->hasFile('image')) {
            if (isset($product->image)){
                $deleted = Storage::disk('public2')->delete($product->image);
            }
            $fileName = Str::slug($request->title["tr"], '-');
            $image = $request->file('image')->storeAs('products', $fileName . '.webp','public2');
//            $imagePath = str_replace('\/', '/', $image);
            $product->meta_og_image = $image;
            $product->image = $image;
        }

        /*//SEO
        $product->setTranslations('meta_title',$request->meta_title);
        $product->setTranslations('meta_og_title',$request->meta_og_title);
        $product->setTranslations('meta_description',$request->meta_description);
        $product->setTranslations('meta_og_url',$request->meta_og_url);
        $product->setTranslations('meta_og_type',$request->meta_og_type);
        $product->setTranslations('meta_canonical',$request->meta_canonical);
        $product->setTranslations('meta_keywords',$request->meta_keywords);
        $product->setTranslations('meta_author',$request->meta_author);
        $product->setTranslations('meta_og_description',$request->meta_og_description);*/

        $saved= $product->update();

        if ($saved) {
            return redirect()->route('admin.products.index')->with('success', 'Başarıyla Güncellendi');
        } else {
            return back()->with('erorr', 'Güncelleme işlemi yapılırken,hata oluştu lütfen tekrar deneyiniz!');
        }
    }

    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        if ($product) {
            return back()->with('success', 'Proje başarıyla silindi.');
        }
        return back()->with('error', 'Bir hata oluştu.');
    }
}
