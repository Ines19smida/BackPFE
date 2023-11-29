<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NiveauEtude;

class NiveauEtudeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'string|required',
           
        ]);
        return NiveauEtude::create($request->all());
    }

    public function destroy($id)
    {
        return NiveauEtude::destroy($id);
    }
    public function update(Request $request, $id)
    {
         $NiveauEtude = NiveauEtude::find($id);
         $NiveauEtude->update($request->all());
         return $NiveauEtude;
    }
    public function index()
    {
        return NiveauEtude::all();
    }

}
