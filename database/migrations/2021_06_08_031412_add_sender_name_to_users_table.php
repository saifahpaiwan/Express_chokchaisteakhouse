<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSenderNameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sender_fname');
            $table->string('sender_lname');
            $table->string('sender_email');
            $table->string('sender_phone');
            $table->string('sender_no');
            $table->string('sender_address');
            $table->string('sender_parish');
            $table->string('sender_district');
            $table->string('sender_province');
            $table->string('sender_zipcode');
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
            //
        });
    }
}
