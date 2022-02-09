<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rawJson = file_get_contents('https://age-of-empires-2-api.herokuapp.com/api/v1/civilizations');
        $decodeJson = json_decode($rawJson, true);
        $civJson = json_encode($decodeJson['civilizations']);
        $decodeCivJson = json_decode($civJson, true);

        foreach($decodeCivJson as $elements){
            //print_r( $elements);
            //var_dump($elements);
            $id = $elements['id'];
            $name = $elements['name'];
            $expansion = $elements['expansion'];
            $army_type = $elements['army_type'];
            $team_bonus = $elements['team_bonus'];
            $civilization_bonus = serialize($elements['civilization_bonus']);
            //var_dump($civilization_bonus);

            DB::table('civilizations')->insert([
                ['id'=>$id,'name'=>$name,'expansion'=>$expansion,'army_type'=>$army_type,'team_bonus'=>$team_bonus,'civilization_bonus'=>$civilization_bonus]
            ]);
    }
}
}