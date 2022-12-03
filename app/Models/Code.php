<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Voter;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'validity',
        'voter_id'
    ];

    public function voter(){
        return $this->belongsTo(Voter::class);
    }
}
