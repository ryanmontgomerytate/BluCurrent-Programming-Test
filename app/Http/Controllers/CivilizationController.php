<?php

namespace App\Http\Controllers;

use App\Models\Civilizations;

class CivilizationController extends Controller
{
    public function getCivilizations(){
        return response()->json(Civilizations::all(),200);
    }

    public function deleteCivilizations($id){
        $civilization = Civilizations::find($id);
        $civilization->delete();
    }
}