<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Voter;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname'
    ];

    public function voters(){
        return $this->hasMany(Voter::class);
    }

}
