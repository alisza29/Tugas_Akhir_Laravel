<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminmodel extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primarykey = 'id_admin';
    public $timestamps = false;
    public $fillable = [
        'admin_name',
        'email',
        'password',
    ];
}
