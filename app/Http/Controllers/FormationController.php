<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;

class FormationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'string|required',
           
        ]);
        return Formation::create($request->all());
    }

    public function destroy($id)
    {
        return Formation::destroy($id);
    }

    public function update(Request $request, $id)
    {
         $Formation = Formation::find($id);
         $Formation->update($request->all());
         return $Formation;
    }
    public function index()
    {
        return Formation::all();
    }

}
