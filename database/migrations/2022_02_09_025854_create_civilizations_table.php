<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();

        Schema::create('civilizationz', function (Blueprint $table) {
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
            $civilization_bonus = $elements['civilization_bonus'];
            $civilization_bonus1 = json_encode($civilization_bonus);
            //$civilization_bonus = serialize($elements['civilization_bonus']);
            var_dump($civilization_bonus1);

            DB::insert('insert into civilizationz (id,name,expansion,army_type,team_bonus,civilization_bonus) values (?,?,?,?,?,?)',[$id,$name,$expansion,$army_type,$team_bonus,$civilization_bonus1]);

            // DB::table('civilizationz')->insert([
            //     ['id'=>$id,'name'=>$name,'expansion'=>$expansion,'army_type'=>$army_type,'team_bonus'=>$team_bonus,'civilization_bonus'=>$civilization_bonus]
            // ]);

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('civilizationz');
    }
};
