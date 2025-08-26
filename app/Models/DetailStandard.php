<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailStandard extends Model
{
    use HasFactory;

    protected $table = 'detail_standards';
    protected $guarded = [];

    public function Standard(){
        return $this->belongsTo(Standard::class, "id_standard", "id");
    }
    public function Client(){
        return $this->belongsTo(Client::class, "id_client", "id");
    }
}
