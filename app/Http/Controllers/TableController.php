<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableInfo;

class TableController extends Controller
{
    public function showAddForm()
    {
        return view('add-table');
    }

    public function addTable(Request $request)
    {
        $request->validate([
            'id_table' => 'required',
            'building' => 'required',
            'floor' => 'required',
            'number' => 'required',
        ]);

        $table = new TableInfo();
        $table->id_table = $request->id_table;
        $table->Gedung = $request->building;
        $table->Lantai = $request->floor;
        $table->Nomor = $request->number;
        $table->save();

        return redirect()->route('add-table')->with('success', 'Table added successfully');
    }
}
