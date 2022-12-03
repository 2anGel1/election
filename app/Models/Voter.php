<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Candidat;
use App\Models\Code;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'candidat_id'
    ];

    public function code(){
        return $this->hasOne(Code::class);
    }

    public function candidat(){
        return $this->belongsTo(Candidat::class);
    }
}
