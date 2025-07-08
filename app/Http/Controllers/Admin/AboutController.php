<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index(){
        $about = About::first();
        return view('admin.pages.about.edit',['about'=>$about]);
    }

    public function edit($id)
    {
        $about = About::first();
        return view('admin.pages.about.edit',['about'=>$about]);
    }

    public function update(Request $request,$id){

        $about = About::first();
        $about->setTranslations('meta_title',$request->meta_title);
        $about->setTranslations('meta_og_title',$request->meta_og_title);
        $about->setTranslations('meta_description',$request->meta_description);
        $about->setTranslations('meta_og_url',$request->meta_og_url);
        $about->setTranslations('meta_og_image',$request->meta_og_image);
        $about->setTranslations('meta_og_type',$request->meta_og_type);
        $about->setTranslations('meta_canonical',$request->meta_canonical);
        $about->setTranslations('meta_keywords',$request->meta_keywords);
        $about->setTranslations('meta_author',$request->meta_author);
        $about->setTranslations('meta_og_description',$request->meta_og_description);

        $about->setTranslations('text',$request->text);
        $about->setTranslations('text_short',$request->text_short);
        $about->setTranslations('targets',$request->targets);
        $about->setTranslations('company_values',$request->company_values);
        $saved = $about->save();

        if($saved)
            return redirect()->route('admin.abouts.edit',$about->id)->with('success','Başarıyla Güncellendi');
        else
            return back()->with('error','Güncellenirken Hata Oluştu');

//        $contact = About::first();
//        return view('site.pages.about',['contact'=>'contact']);
    }

}
