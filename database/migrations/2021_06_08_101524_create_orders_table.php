<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id'); 
            $table->string('order_code');
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

            $table->float('price_total');
            $table->float('price_cost');
            $table->float('price_delivery');
            $table->float('price_discount');
            $table->float('net_total');

            $table->char('delivery_form');
            $table->string('payment'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
