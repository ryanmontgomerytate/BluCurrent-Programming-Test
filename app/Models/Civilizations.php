<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Civilizations extends Model
{
    use HasFactory;

    protected $civilization = [
        'id',
        'name',
        'expansion',
        'army_type',
        'team_bonus',
        'civilization_bonus_0',
        'civilization_bonus_1',
        'civilization_bonus_2',
        'civilization_bonus_3',
        'civilization_bonus_4'
    ];
    
}
