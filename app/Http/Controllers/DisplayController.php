<?php

namespace App\Http\Controllers;

use App\Models\Civilizations;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index()
    {
        $civilizations = Civilizations::get();
        return view('display', [
            'civilizations' => $civilizations
        ]);
    }
}
