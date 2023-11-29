<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competence;

class CompetenceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'string|required',
        
        ]);
        return Competence::create($request->all());
    }

    public function destroy($id)
    {
        return Competence::destroy($id);
    }
    public function update(Request $request, $id)
    {
         $Competence = Competence::find($id);
         $Competence->update($request->all());
         return $Competence;
    }
    public function index()
    {
        return Competence::all();
    }

}
