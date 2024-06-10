<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function create()
    {
        return view('add-member');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'member_type' => 'required',
        ]);

        try {
            Member::create([
                'Nama' => $request->nama,
                'Member_type' => $request->member_type,
            ]);

            return redirect()->route('add-member')->with('success', 'New record created successfully');
        } catch (\Exception $e) {
            return redirect()->route('add-member')->with('error', $e->getMessage());
        }
    }
}
