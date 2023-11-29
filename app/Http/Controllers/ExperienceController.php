<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'string|required',
           
        ]);
        return Experience::create($request->all());
    }

    public function destroy($id)
    {
        return Experience::destroy($id);
    }
    public function update(Request $request, $id)
    {
         $Experience = Experience::find($id);
         $Experience->update($request->all());
         return $Experience;
    }
    public function index()
    {
        return Experience::all();
    }

}
