<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'id_Transaction';
    public $timestamps = false;

    protected $fillable = [
        'id_member', 'id_trxTableBilliard', 'Date_checkout', 'Time_checkout', 'Amount',
    ];

    // Relasi ke tabel member
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }

    // Relasi ke tabel trxtablebilliard
    public function trxtablebilliard()
    {
        return $this->belongsTo(TrxTableBilliard::class, 'id_trxTableBilliard', 'id_trxTableBilliard');
    }
}
