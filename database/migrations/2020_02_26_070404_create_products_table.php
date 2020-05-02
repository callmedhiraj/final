<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('product_code')->unique();
            $table->longText('description');
            $table->string('featured_image');
            $table->string('brand')->nullable();
            $table->string('expiry_time');
            $table->double('price');
            $table->string('condition');
            $table->string('used_for');
            $table->boolean('delivery');
            $table->string('delivery_area')->nullable();
            $table->double('delivery_charge')->nullable();
            $table->string('warranty_period');
            $table->enum('status',[1,2,3,4]);
            $table->integer('views')->nullable();
            $table->integer('likes')->nullable();
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
        Schema::drop('products');
    }
}
