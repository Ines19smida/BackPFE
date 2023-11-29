<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Competence;
use App\Models\Langue;
use App\Models\Ville;
use App\Models\Experience;
use App\Models\NiveauEtude;
use App\Models\Formation;

class cv extends Model
{
    use HasFactory;
    protected $fillable =[
        'nom',
        'prenom',
        'competence_id',
        'langue_id',
        'experience_id',
        'ville_id',
        'niveauetude_id',
        'formation_id'
       
       
    ];
}
