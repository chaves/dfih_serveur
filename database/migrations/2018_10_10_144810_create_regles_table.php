<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_id')->unsigned()->default(0);
            $table->foreign('source_id')->references('id')->on('sources');
            $table->enum('niveau', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->default(1);
            $table->string('montant');
            $table->string('unite');
            $table->enum('ordre', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20])->default(1);
            $table->string('cible');
            $table->boolean('flag_chiffre_independant_des_benefs')->default(0);
            $table->string('cible_si_independant')->default('');;
            $table->string('exception');
            $table->boolean('flag_optionel')->default(0);
            $table->string('min');
            $table->string('max');
            $table->boolean('flag_cible_multiple')->default(0);
            $table->boolean('flag_delegation')->default(0);
            $table->boolean('flag_illisible')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regles');
    }
}
