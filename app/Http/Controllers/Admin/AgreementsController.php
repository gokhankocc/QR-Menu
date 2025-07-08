<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Admin\Agreement;
use App\Models\Admin\Category;
use App\Models\Admin\Category_main;
use App\Models\Admin\ColorPalette;
use App\Models\Admin\Corner;
use App\Models\Admin\Faq;
use App\Models\Admin\GeneralSetting;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AgreementsController extends Controller
{
    public function index()
    {
        $agreements = Agreement::orderBy('id','desc')->get();
        return view('admin.pages.agreements.index',compact('agreements'));
    }

    public function edit($id)
    {
        $agreement = Agreement::where('id',$id)->first();
        return view('admin.pages.agreements.edit',compact('agreement'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $agreement = Agreement::where('id',$id)->first();
        $agreement->title = $request->title;
        $title = $request->title;
        $slug = Str::slug($title, '-');
        $agreement->slug = $slug;
        $agreement->content = $request->text;
        $saved = $agreement->update();

        if($saved)
            return redirect()->route('admin.agreements.index')->with('success','Başarıyla Güncellendi');
        else
            return back()->with('error','Güncellenirken Hata Oluştu');
    }
}
