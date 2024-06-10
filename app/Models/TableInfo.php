<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableInfo extends Model
{
    use HasFactory;

    protected $table = 'tableinfo';
    protected $primaryKey = 'id_table';
    public $timestamps = false;

    protected $fillable = [
        'Gedung', 'Lantai', 'Nomor', 'Action',
    ];
}
