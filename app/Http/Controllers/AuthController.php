<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Member;
use App\Models\TableInfo;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:user',
            'pswd' => 'required|min:6',
        ]);

        $user = new User();
        $user->Nama = $request->nama;
        $user->Username = $request->username;
        $user->Email = $request->email;
        $user->Password = $request->pswd;
        $user->Role = 'user';
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('Email', $email)->where('Password', $password)->first();

        if ($user) {
            auth()->login($user);

            return redirect()->route('dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['email' => 'Email atau password salah.']);
    }



    public function dashboard()
    {
        $memberCount = Member::count();
        $availableTables = TableInfo::where('Action', 'NoAction')->count();
        $totalTables = TableInfo::count();
        return view('dashboard', compact('memberCount', 'availableTables', 'totalTables'));
    }
}
