<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cv;

class CvController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'string|required',
            'prenom' => 'string|required',
            'langue_id' => 'int',
            'competence_id' => 'int',
            'ville_id' => 'int',
            'experience_id' => 'int',
            'niveauetude_id' => 'int',
            'formation_id' => 'int',
            
        ]);
        return Cv::create($request->all());
    }

    public function update(Request $request, $id)
    {
         $Cv = Cv::find($id);
         $Cv->update($request->all());
         return $Cv;
    }

    public function show($id)
    {
        return Cv::find($id);
    }
}
