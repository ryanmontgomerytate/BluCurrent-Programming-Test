<?php

namespace App\Http\Controllers;

use App\Models\Civilizations;

class CivilizationController extends Controller
{
    public function getCivilizations(){
        return response()->json(Civilizations::all(),200);
    }
}