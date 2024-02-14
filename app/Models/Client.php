<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id'
    ];

    public function Standard(){
        return $this->belongsTo(Standard::class, "id_standar", "id");
    }

    public function RuangLingkup(){
        return $this->belongsTo(RuangLingkup::class, "id_ruang_lingkup", "id");
    }
}
