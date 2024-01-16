<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coachmodel extends Model
{
    use HasFactory;
    protected $table = 'coach';
    protected $primarykey = 'id_coach';
    public $timestamps = false;
    public $fillable = [
        'coach_name',
        'email',
        'password',
    ];
}
