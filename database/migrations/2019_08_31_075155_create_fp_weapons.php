<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFpWeapons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fp_weapons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('weapon_name');
            $table->tinyInteger('status')->default(0)->comment('0:active, 1:deactive, 2;deleted');
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
        Schema::dropIfExists('fp_weapons');
    }
}
