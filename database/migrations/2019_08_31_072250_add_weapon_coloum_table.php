<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeaponColoumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fp_users', function (Blueprint $table) {
            $table->text('about')->nullable()->after('pincode');
            $table->string('weapon_number')->nullable()->after('weapon_id');
            $table->string('weapon_documnet')->nullable()->after('weapon_number');
            $table->date('weapon_valid_from')->default(date("Y-m-d"))->after('weapon_documnet');
            $table->date('weapon_valid_upto')->default(date("Y-m-d"))->after('weapon_valid_from');
            $table->tinyInteger('is_weapon_verified')->default(0)->after('weapon_valid_upto');
            $table->tinyInteger('is_user_verified')->default(0)->after('is_weapon_verified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fp_users', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('weapon_number');
            $table->dropColumn('weapon_documnet');
            $table->dropColumn('weapon_valid_from');
            $table->dropColumn('weapon_valid_upto');
            $table->dropColumn('is_weapon_verified');
            $table->dropColumn('is_user_verified');
            
        });
    }
}
