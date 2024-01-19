<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'sex',
        'birthday',
        'death',
        'specie_id',
        'image'
    ];

    protected $casts = [
        'birthday' => 'date:d-m-Y',
        'death' => 'date:d-m-Y'
    ];

    public function specie(){
        return $this->belongsTo(Specie::class);
    }
}
