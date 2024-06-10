<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:admin,Email', // Sesuaikan dengan nama kolom Email di tabel admin
            'password' => 'required|min:6',
            'role' => 'required|in:admin,officer',
        ]);

        try {
            Admin::create([
                'Nama' => $request->nama,
                'Username' => $request->username,
                'Email' => $request->email,
                'Password' => $request->password, // Menyimpan password tanpa hashing
                'Role' => $request->role,
            ]);

            return redirect()->route('admin.create')->with('status', 'success');
        } catch (\Exception $e) {
            return redirect()->route('admin.create')->with('status', 'error')->with('message', $e->getMessage());
        }
    }
}
