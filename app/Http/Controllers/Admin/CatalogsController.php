<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Admin\CategoryGroup;


class CatalogsController extends Controller
{

    public function index()
    {
        $catalogs = Catalog::all();
        //$blogContentLimitted= \Illuminate\Support\Str::limit($blog->text,50);
        return view('admin.pages.catalogs.index', compact('catalogs'));
    }

    public function create()
    {
        return view('admin.pages.catalogs.create');
    }

    public function store(Request $request)
    {
        $catalog = new Catalog();

        //$product->name = $request->name;
        $catalog->setTranslations('name',$request->name);

        if ($request->hasFile('url')) {
            $fileName = Str::slug($request->name["tr"], '-');
            $url = $request->file('url')->storeAs('catalogs', $fileName . '.pdf','public2');
            $catalog->url = $url;
        }
        $saved = $catalog->save();

        if ($saved)
            return redirect()->route('admin.catalogs.create')->with('success', 'Başarıyla Eklendi');
        else
            return back()->with('error', 'Eklenirken Hata Oluştu');


    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $catalog = Catalog::find($id);
        return view('admin.pages.catalogs.edit', compact('catalog'));
    }

    public function update(Request $request, $id)
    {
        $catalog = Catalog::find($id);
        //$product->name = $request->name;
        $catalog->setTranslations('name',$request->name);

        /*if ($request->hasFile('url')) {
            $url = $request->file('url')->store('catalogs', 'public2');
            $catalog->url = $url;
        }*/
        if ($request->hasFile('url')) {
            $fileName = Str::slug($request->name["tr"], '-');
            $url = $request->file('url')->storeAs('catalogs', $fileName . '.pdf','public2');
            $catalog->url = $url;
        }
        $saved = $catalog->update();

        if ($saved)
            return redirect()->route('admin.catalogs.index')->with('success', 'Başarıyla Düzenlendi');
        else
            return back()->with('error', 'Eklenirken Hata Oluştu');
    }

    public function destroy($id)
    {
        $catalog = Catalog::find($id);

        if($catalog->url != ""){
            if(File::exists(public_path("/storage") . $catalog->url)){
                File::delete(public_path("/storage") . $catalog->url);
            }
        }

        $deleted = $catalog->delete();

        if ($deleted) {
            return back()->with('success', 'Katalog silindi.');
        } else {
            return back()->with('error', 'Bir hata oluştu.');
        }
    }
}
