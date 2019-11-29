<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFpUserWeapons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fp_user_weapons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('number');
            $table->string('documnet')->nullable();
            $table->date('valid_from')->default(date("Y-m-d"));
            $table->date('valid_upto')->default(date("Y-m-d"));
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
        Schema::dropIfExists('fp_user_weapons');
    }
}
