<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();

        Schema::create('civilizations', function (Blueprint $table) {
            $table->integer('id');
            $table->text('name');
            $table->text('expansion');
            $table->text('army_type');
            $table->text('team_bonus');
            $table->json('civilization_bonus');
        });

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
            $civilization_bonus = json_encode($elements['civilization_bonus']);

            DB::insert('insert into civilizations (id,name,expansion,army_type,team_bonus,civilization_bonus) values (?,?,?,?,?,?)',[$id,$name,$expansion,$army_type,$team_bonus,$civilization_bonus]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('civilizations');
    }
};