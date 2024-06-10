<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'Nama', 'Username', 'Email', 'Password', 'Role',
    ];
    protected $hidden = [
        'Password',
    ];
    protected $casts = [
        'Email_verified_at' => 'datetime',
    ];
}
