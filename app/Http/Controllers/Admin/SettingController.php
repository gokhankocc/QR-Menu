<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Category_main;
use App\Models\Admin\ColorPalette;
use App\Models\Admin\Corner;
use App\Models\Admin\Faq;
use App\Models\Admin\GeneralSetting;
use App\Models\Admin\MessagePresident;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::orderBy('id','desc')->first();
        return view('admin.pages.settings.index',compact('settings'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $settings= GeneralSetting::find($id);
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->whatsapp = $request->whatsapp;
        $settings->full_address = $request->full_address;
        $settings->map = $request->map;
        $settings->twitter = $request->twitter;
        $settings->facebook = $request->facebook;
        $settings->instagram = $request->instagram;
        $settings->youtube = $request->youtube;
        $saved = $settings->update();

        if($saved)
            return redirect()->route('admin.settings.index')->with('success','Başarıyla Güncellendi');
        else
            return back()->with('error','Güncellenirken Hata Oluştu');
    }
}
