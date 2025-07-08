<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Reference;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use Illuminate\Support\Str;

class ReferencesController extends Controller
{

    public function index()
    {
        $references = Reference::orderBy('created_at','desc')->get();

        return view('admin.pages.references.index', compact('references'));

    }

    public function create()
    {
        return view('admin.pages.references.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $reference = new Reference();

        $reference->title = $request->title;
        if ($request->hasFile('image')) {
            $fileName = '/references';
            $path = $request->file('image')->store($fileName, 'public2');
            $reference->image  = '/storage/' . $path;
        }
        $saved = $reference->save();

        if ($saved) {
            return redirect()->route('admin.references.index')->with('success', 'Referans başarıyla eklendi');
        }
        return back()->with('error', 'Referans eklenirken bir problem oluştu lütfen tekrar deneyiniz');
    }


    public function edit($id)
    {
        $reference = Reference::find($id);
        return view('admin.pages.references.edit', compact('reference'));
    }

    public function update(Request $request, $id)
    {
        $reference = Reference::find($id);
        $reference->title = $request->title;
        if ($request->hasFile('image')) {
            $fileName = '/references';
            $path = $request->file('image')->store($fileName, 'public2');
            $reference->image  = '/storage/' . $path;
        }
        $saved = $reference->update();
        if ($saved) {
            return redirect()->route('admin.references.index')->with('success', 'Başarıyla Güncellendi');
        } else {
            return back()->with('error', 'Güncelleme işlemi yapılırken,hata oluştu lütfen tekrar deneyiniz!');
        }
    }

    public function destroy($id)
    {
        $reference = Reference::find($id);
        $reference->delete();
        if ($reference) {
            return back()->with('success', 'Referans başarıyla silindi.');
        }
        return back()->with('error', 'Bir hata oluştu.');
    }
}
