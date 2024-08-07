<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Admin;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user');
    }
    
    public function data(Request $request)
    {
        $admins = Admin::all();
        $pegawais = Pegawai::all();
        $datas = [];
        foreach ($admins as $admin) {
            $datas[] = [
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'role' => 'admin',
            ];
        }
        foreach ($pegawais as $pegawai) {
            $datas[] = [
                'id' => $pegawai->id,
                'name' => $pegawai->name,
                'email' => $pegawai->email,
                'role' => 'pegawai',
            ];
        }

        return \DataTables::of($datas)->toJson();
    }

    public function add()
    {
        return view('pages.user-add');
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required|in:pegawai,admin',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
            ],
        ]);

        if($request->role === 'admin'){
            $admin = new Admin;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->save();
        }else if($request->role === 'pegawai'){
            $pegawai = new Pegawai;
            $pegawai->name = $request->name;
            $pegawai->email = $request->email;
            $pegawai->password = bcrypt($request->password);
            $pegawai->save();
        }else{
            return redirect()->back()->with('error', 'Role invalid');
        }

        return redirect()->route('user')->with('success', 'Sukses');
    }
}
