<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;

class AvisController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'avis' => 'required'
        ]);
        return Avis::create($request->all());
    }
}
