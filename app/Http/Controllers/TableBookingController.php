<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TableBookingController extends Controller
{
    public function create()
    {
        $tables = DB::table('tableinfo')->where('action', 'NoAction')->get();
        return view('tablebook', compact('tables'));
    }

    public function store(Request $request)
    {
        $id_member = $request->input('id_member');
        $id_table = $request->input('table');

        // Validasi id_member
        $memberExists = DB::table('member')->where('id_member', $id_member)->exists();
        if (!$memberExists) {
            return redirect()->route('tablebook.create')->with('error', 'ID Member tidak valid.');
        }

        // Set zona waktu ke Asia/Jakarta
        $now = Carbon::now('Asia/Jakarta');
        $date = $now->format('Y-m-d');
        $time = $now->format('H:i:s');

        // Validasi ketersediaan meja
        $tableAvailable = DB::table('tableinfo')->where('id_table', $id_table)->where('action', 'NoAction')->exists();
        if (!$tableAvailable) {
            return redirect()->route('tablebook.create')->with('error', 'Meja sudah terisi. Silakan coba lagi nanti.');
        }

        // Insert data ke trxtablebilliard
        DB::table('trxtablebilliard')->insert([
            'id_member' => $id_member,
            'Date' => $date,
            'Time' => $time,
            'id_table' => $id_table
        ]);

        // Update status meja
        DB::table('tableinfo')->where('id_table', $id_table)->update(['action' => 'Active']);

        // Redirect ke halaman tablebook dengan pesan sukses
        return redirect()->route('tablebook.create')->with('success', 'Pemesanan berhasil.');
    }
}
