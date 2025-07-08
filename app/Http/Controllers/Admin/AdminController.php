<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//
//class AdminController extends Controller
//{
//    public function index(){
//        return view('admin.pages.index');
//    }
//}



namespace App\Http\Controllers\Admin;

use App\Http\Middleware\User;
use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\Branch;
use App\Models\Admin\Order;
use App\Models\Admin\User as Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function loginpage()
    {

        return view('admin.pages.login');
    }

    public function index(){
        $branches = Branch::all();
        return view('admin.pages.index',compact('branches'));
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 1
        ])) {
            request()->session()->regenerate();
            return redirect()->route('admin.home');
        } else {
            return back()->with('error','Kullanıcı Adı veya Şifre Hatalı');
        }

    }

    public function logout()
    {
        \auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
