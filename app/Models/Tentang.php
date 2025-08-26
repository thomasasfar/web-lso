<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    protected $table = 'tentangs';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id', 'judul'
    ];

}
