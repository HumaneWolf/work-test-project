<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE VIEW movies_view AS
            SELECT M.*, avg(R.rating) as rating
            FROM movies M
            INNER JOIN ratings R
            ON R.movie_id = M.id
            GROUP BY M.id;
            ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS movies_view;');
    }
}
