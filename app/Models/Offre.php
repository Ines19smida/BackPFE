<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Offre extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'sujet',
        'description',
        'experience',
        'niveauEtude',
        'dateDeDebut',
        'localisation',
        'teletravail',
        'isArchived',
        'user_id'

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function condidatures(){
        return $this->hasMany(Condidature::class);
    }
}
