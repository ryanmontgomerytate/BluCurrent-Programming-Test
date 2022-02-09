<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();

        $file = __DIR__ .'/civ_table_from_csv.sql';
        $sql = file_get_contents($file);

        $mysqli = new mysqli("localhost", "root", "", "age_of_empires");

        /* execute multi query */
        $mysqli->multi_query($sql);


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