<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('user_id')->constrained(); // admin_id
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->string('style')->nullable(); // using string instead of text
            $table->string('brand')->nullable(); // using string instead of text
            $table->string('url')->nullable();
            $table->string('product_type')->nullable();
            $table->integer('shipping_price')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index([
                'product_name',
                'product_type',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
