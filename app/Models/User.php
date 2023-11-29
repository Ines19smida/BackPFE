<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Offre;
use App\Models\Condidature;
use App\Models\Contact;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'numTel',
        'adresseEmail',
        'MotDePasse',
        'photo',
        'description',
        'adresse',
        'equipe',
        'type',
        'niveauEtude',
        'competences',
        'experiences'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'MotDePasse',
        'remember_token',
    ];


    public function offres(){
        return $this->hasMany(Offre::class);
    }

    public function condidaturess()
    {
        return $this->belongsToMany(Condidature::class);
    }

    public function contacts(){
        return $this->hasMany(Contact::class);
    }


}
