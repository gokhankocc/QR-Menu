<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::orderBy('created_at','desc')->get();

        return view('admin.pages.sliders.index', compact('sliders'));

    }

    public function create()
    {
        return view('admin.pages.sliders.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $slider = new Slider();
        $slider->setTranslations('top_title',$request->top_title);
        $slider->setTranslations('sub_title',$request->sub_title);
        if ($request->hasFile('image')) {
            $fileName = '/sliders';
            $path = $request->file('image')->store($fileName, 'public2');
            $slider->image  = '/storage/' . $path;
        }
        if ($request->hasFile('sub_image')) {
            $fileName = '/sliders';
            $path = $request->file('sub_image')->store($fileName, 'public2');
            $slider->sub_image  = '/storage/' . $path;
        }
        $saved = $slider->save();

        if ($saved) {
            return redirect()->route('admin.sliders.index')->with('success', 'Slider başarıyla eklendi');
        }
        return back()->with('error', 'Slider eklenirken bir problem oluştu lütfen tekrar deneyiniz');
    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.pages.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::where('id',$id)->first();
        $slider->setTranslations('top_title',$request->top_title);
        $slider->setTranslations('sub_title',$request->sub_title);
        if ($request->hasFile('image')) {
            $fileName = '/sliders';
            $path = $request->file('image')->store($fileName, 'public2');
            $slider->image  = '/storage/' . $path;
        }
        $saved = $slider->update();
        if ($saved) {
            return redirect()->route('admin.sliders.index')->with('success', 'Başarıyla Güncellendi');
        } else {
            return back()->with('error', 'Güncelleme işlemi yapılırken,hata oluştu lütfen tekrar deneyiniz!');
        }
    }

    public function destroy($id)
    {
        $slider = Slider::where('id',$id)->first();
        $slider->delete();
        if ($slider) {
            return back()->with('success', 'Slider başarıyla silindi.');
        }
        return back()->with('error', 'Bir hata oluştu.');
    }
}
