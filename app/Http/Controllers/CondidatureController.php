<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Condidature;
use App\Models\Offre;

class CondidatureController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'numTel' => 'required',
            'adresse' => 'required',
            'offre_id' =>'required',
            'cv_id' =>'required'
        ]);
        return Condidature::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $Condidature = Condidature::find($id);
        $Condidature->update($request->all());
        return $Condidature;
    }
    
    public function search($id)
    {
        $offre =Offre::find($id);
        $condidature_offre=$offre->condidatures;
        //dd($offres_user);
        return $condidature_offre;
    }
}
