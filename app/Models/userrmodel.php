<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userrmodel extends Model
{
    use HasFactory;
    protected $table = 'pengguna';
    protected $primarykey = 'id_user';
    public $timestamps = false;
    public $fillable = [
        'username',
        'email',
        'password',
        'tgl_lahir',   
        'tujuan', 
    ];
}
