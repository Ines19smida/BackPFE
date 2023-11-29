<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'numTel',
        'email',
        'sujet',
        'question',
        'user_id'
        
    ];
    public function utilisateur(){
        return $this->belongTo(User::class);
    }
}
