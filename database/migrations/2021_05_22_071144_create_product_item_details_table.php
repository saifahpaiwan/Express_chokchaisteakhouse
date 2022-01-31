<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_item_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_subsid');
            $table->integer('product_itemsid'); 
            $table->float('prict'); 
            $table->char('check_discount', 1);
            $table->float('discount');
            $table->float('weight');
            $table->timestamps();
            $table->softDeletes(); 
            $table->integer('unit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_item_details');
    }
}
