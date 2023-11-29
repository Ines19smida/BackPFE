<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\OffreController;
use App\Models\Offre;
use App\Models\Condidature;

class UserController extends Controller
{

    public function register(Request $Request){
        $fields = $Request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'numTel' => 'required|string',
                'adresseEmail' => 'required|string',
                'MotDePasse' => 'required|string|confirmed',
                'type' => 'required|string',
                'photo' =>'string',
                'description' => 'string',
                'adresse' =>'string',
                'equipe' =>'string',
                'niveauEtude' =>'string',
                'competences' =>'string',
                'experiences' =>'string'
        ]);

    $user = User::create([
                'nom' => $fields['nom'],
                'prenom' => $fields['prenom'],
                'numTel' => $fields['numTel'],
                'adresseEmail' => $fields['adresseEmail'],
                'MotDePasse' => bcrypt($fields['MotDePasse']),
                'type' => $fields['type']
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response,201);

    }

    public function login(Request $Request){
        $fields = $Request->validate([
            'adresseEmail' => 'required|string',
            'MotDePasse' => 'required|string'
        ]);

        $user = User::where('adresseEmail' , $fields['adresseEmail'])->first();

        if(!$user || !Hash::check($fields['MotDePasse'], $user->MotDePasse)){
            return response([
                'message' => 'Mot de passe invalid'
            ],401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);
    }
    public function logout(Request $Resquest){
        auth()->user()->tokens()->delete();
        return [
            'message' =>'Déconnecté'
        ];
    }

    public function update(Request $request, $id)
    {
        $user= User::find($id);
        $user->update($request->all());
        return $user;
    }

    public function getcondidat(){
        return User::where('type','Condidat')->get();
    }
    public function getrecruteur(){
        return User::where('type','Recruteur')->get();
    }
    public function getadmin(){
        return  User::where('type','Administrateur')->get();
    }

    public function getUserById(Request $request){
        $fields = $request->validate([
            'id' => 'required',
        ]);

        $user = User::find($fields['id']);
        $respons = ['user' => $user];
        $respons['offers'] = $user->offres;
        return response()->json($respons);
    }

    public function getuser($condidature_id, $user_id){

        $condidature = Condidature::find($condidature_id);
        $user = User::find($user_id);
        $user->condidaturess()->attach($condidature);
        return 'Success';
    }
    public function profil(Request $request){
        $user= auth()->user();
        $respons = ['user' => $user];
        $offre = $request->get('offre', false);
        if($offre){
            $respons['offers'] = $user->offres;
        }
        return response()->json($respons);

    }
}
