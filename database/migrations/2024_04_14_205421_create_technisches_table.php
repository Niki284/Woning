<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technisches', function (Blueprint $table) {
            $table->id();
            $table->integer('woning_id')->nullable();
            $table->string('bouwjaar');
            $table->string('algemene_staat');
            $table->string('renovatieverplichting');
            $table->string('overstromingsgevoeligheid');
            $table->string('afgebakende_zone');
            $table->string('G_ebouw_score');
            $table->string('P_erceel_score');
            $table->string('certificaat_elektriciteit');
            $table->string('lift');
            $table->string('EPC');
            $table->string('totale_opp_grond');
            $table->string('bouw_opp_grond');
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
        Schema::dropIfExists('technisches');
    }
};
