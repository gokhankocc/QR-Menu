<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::orderBy('created_at','desc')->get();

        return view('admin.pages.branches.index', compact('branches'));

    }

    public function create()
    {
        //return view('admin.pages.blogs.create');
    }

    public function store(Request $request)
    {
        //
    }


    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('admin.pages.branches.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $branch = Branch::find($id);

        $branch->name = $request->name;

        if ($request->hasFile('image')) {
            if (isset($branch->image)){
                $deleted = Storage::disk('public2')->delete($branch->image);
            }
            $fileName = Str::slug($request->name, '-').'-kapak';
            $image = $request->file('image')->storeAs('branches', $fileName . '.webp','public2');
//            $imagePath = str_replace('\/', '/', $image);
            $branch->image = $image;
        }

        if ($request->hasFile('logo')) {
            if (isset($branch->logo)){
                $deleted = Storage::disk('public2')->delete($branch->logo);
            }
            $fileName = Str::slug($request->name, '-').'-logo';
            $logo = $request->file('logo')->storeAs('branches', $fileName . '.webp','public2');
//            $imagePath = str_replace('\/', '/', $image);
            $branch->logo = $logo;
        }

        $saved= $branch->update();

        if ($saved) {
            return redirect()->route('admin.branches.index')->with('success', 'Başarıyla Güncellendi');
        } else {
            return back()->with('erorr', 'Güncelleme işlemi yapılırken,hata oluştu lütfen tekrar deneyiniz!');
        }
    }

    public function destroy($id)
    {
        //
    }

    public function changeCurrentBranch($id)
    {
        $admin = auth('admin')->user();
        $admin->current_branch = $id;
        $admin->update();
        return redirect()->route('admin.home')->with('success', 'Başarıyla Geçiş Yapıldı');

    }
}
