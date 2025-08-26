<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRuangLingkup extends Model
{
    use HasFactory;

    protected $table = 'detail_ruang_lingkups';
    protected $guarded = [];

    public function RuangLingkup(){
        return $this->belongsTo(RuangLingkup::class, "id_ruang_lingkup", "id");
    }
    public function Client(){
        return $this->belongsTo(Client::class, "id_client", "id");
    }
}
