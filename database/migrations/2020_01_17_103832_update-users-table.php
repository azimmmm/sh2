<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address_id');
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropColumn('bank_number');
            $table->dropColumn('province_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedInteger('address_id');
            $table->string('birthday');
            $table->tinyInteger('gender');
            $table->string('bank_number');
            $table->unsignedInteger('province_id');



        });
    }
}
