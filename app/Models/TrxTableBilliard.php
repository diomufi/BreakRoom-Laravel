<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxTableBilliard extends Model
{
    use HasFactory;

    protected $table = 'trxtablebilliard';
    protected $primaryKey = 'id_trxTableBilliard';
    public $timestamps = false;

    protected $fillable = [
        'id_member', 'Date', 'Time', 'id_table',
    ];

    // Relasi ke tabel member
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }

    // Relasi ke tabel tableinfo
    public function tableinfo()
    {
        return $this->belongsTo(TableInfo::class, 'id_table', 'id_table');
    }
}
