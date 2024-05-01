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
        Schema::create('indelings', function (Blueprint $table) {
            $table->id();
            $table->integer('woning_id')->nullable();
            $table->string('badkamer');
            $table->string('berging');
            $table->string('bureau');
            $table->string('garage');
            $table->string('keuken');
            $table->string('living');
            $table->string('parkeerplaats');
            $table->string('slaapkamer');
            $table->string('terras');
            $table->string('toilet');
            $table->string('tuin');
            $table->string('wasplaats');
            $table->string('zolder');
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
        Schema::dropIfExists('indelings');
    }
};
