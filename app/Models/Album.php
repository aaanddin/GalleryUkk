<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $guarded = ['AlbumID'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }
}
