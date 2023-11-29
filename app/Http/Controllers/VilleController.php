<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;

class VilleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'string|required',
           
        ]);
        return Ville::create($request->all());
    }

    public function destroy($id)
    {
        return Ville::destroy($id);
    }

    public function update(Request $request, $id)
    {
         $Ville = Ville::find($id);
         $Ville->update($request->all());
         return $Ville;
    }
    public function index()
    {
        return Ville::all();
    }

}
