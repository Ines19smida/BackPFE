<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Offre::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sujet' => 'required',
            'description' => 'required',
            'experience' => 'required',
            'niveauEtude' => 'required',
            'dateDeDebut' => 'required',
            'localisation' => 'required',
            'teletravail' => 'required',
            'user_id' =>'required'
        ]);
        return Offre::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Offre::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $Offre = Offre::find($id);
         $Offre->update($request->all());
         return $Offre;
    }
    /**
     * search for a sujet
     *
     * @param  str  $sujet
     * @return \Illuminate\Http\Response
     */
    public function search($sujet)
    {
        return Offre::where('sujet',$sujet)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Offre = Offre::find($id);
        $Offre->update(['isArchived' => true]);
        return $Offre;
    }


    public function getRecrutOffres($id)
    {
        $user =User::find($id);
        $offres_user=$user->offres;
        //dd($offres_user);
        return $offres_user;
    }
    public function getEditFormData(Request $request){
        $request->validate([
            'offreId' =>'required'
        ]);
        $Offre = Offre::find($request->get('offreId'));

        $authUser = auth()->user();
        $offreUser = $Offre->user;
        if ($authUser->id !== $offreUser-> id) {
            return response()->json(['message' => 'error 1'], 407);
        }

        if(!$Offre->condidatures){
            return response()->json(['message' => 'error 2'], 407);
        }

        return response()->json($Offre, 200);

        return response()->json($Offre, 200);

    }

}
