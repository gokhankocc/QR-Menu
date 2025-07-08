<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TeamMember;
use Illuminate\Http\Request;

class TeamMembersController extends Controller
{

    public function index()
    {
        $teamMembers = TeamMember::orderBy('created_at','desc')->get();

        return view('admin.pages.teamMembers.index', compact('teamMembers'));

    }

    public function create()
    {
        //$departments = Department::all();
        return view('admin.pages.teamMembers.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $cleanedPhone = preg_replace('/\D/', '', $request->phone);
        $teamMember = new TeamMember();
        $teamMember->name = $request->name;
        $teamMember->title = $request->title;
        $teamMember->email = $request->email;
        $teamMember->phone = $cleanedPhone;
        if ($request->hasFile('image')) {
            $fileName = '/team_member';
            $path = $request->file('image')->store($fileName, 'public2');
            $teamMember->image  = '/storage/' . $path;
        }
        $saved = $teamMember->save();

        if ($saved) {
            return redirect()->route('admin.team_members.index')->with('success', 'Çalışan başarıyla eklendi');
        }
        return back()->with('error', 'Çalışan eklenirken bir problem oluştu lütfen tekrar deneyiniz');
    }


    public function edit($id)
    {
        $teamMember = TeamMember::find($id);
        return view('admin.pages.teamMembers.edit', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $cleanedPhone = preg_replace('/\D/', '', $request->phone);
        $teamMember = TeamMember::find($id);
        $teamMember->name = $request->name;
        $teamMember->title = $request->title;
        $teamMember->email = $request->email;
        $teamMember->phone = $cleanedPhone;

        if ($request->hasFile('image')) {
            $fileName = '/team_member';
            $path = $request->file('image')->store($fileName, 'public2');
            $teamMember->image  = '/storage/' . $path;
        }
        $saved = $teamMember->update();
        if ($saved) {
            return redirect()->route('admin.team_members.index')->with('success', 'Başarıyla Güncellendi');
        } else {
            return back()->with('error', 'Güncelleme işlemi yapılırken,hata oluştu lütfen tekrar deneyiniz!');
        }
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::find($id);
        $teamMember->delete();
        if ($teamMember) {
            return back()->with('success', 'Çalışan başarıyla silindi.');
        }
        return back()->with('error', 'Bir hata oluştu.');
    }
}
