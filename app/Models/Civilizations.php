<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Civilizations extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $civilizations = [
        'id',
        'name',
        'expansion',
        'army_type',
        'team_bonus',
        'civilization_bonus'
    ];
    
}
