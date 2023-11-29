<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;

class LangueController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'string|required',
           
        ]);
        return Langue::create($request->all());
    }

    public function destroy($id)
    {
        return Langue::destroy($id);
    }
    public function update(Request $request, $id)
    {
         $Langue = Langue::find($id);
         $Langue->update($request->all());
         return $Langue;
    }
    public function index()
    {
        return Langue::all();
    }

}
