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

    public function DetailRuangLingkup(){
        return $this->hasMany(DetailRuangLingkup::class, "id_client", "id");
    }

    public function DetailStandard(){
        return $this->hasMany(DetailStandard::class, "id_client", "id");
    }

    public function Status(){
        return $this->belongsTo(Status::class, "id_status", "id");
    }
}
