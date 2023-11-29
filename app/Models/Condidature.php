<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condidature extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numTel',
        'adresse',
        'offre_id',
        'cv_id'
    ];
    public function offre(){
        return $this->belongTo(Offre::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
