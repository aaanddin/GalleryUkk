<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'fotos_id',
        'users_id',
        'isi_komentar',
        'tanggal_komentar'
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
