<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('sku')->nullable()->unique();
            $table->integer('quantity')->default(0);
            $table->string('color')->nullable(); // using string instead of text
            $table->string('size')->nullable(); // using string instead of text
            $table->double('weight')->default(0);
            $table->integer('price_cents')->default(0);
            $table->integer('sale_price_cents')->default(0);
            $table->integer('cost_cents')->default(0);
            $table->double('length')->default(0);
            $table->double('width')->default(0);
            $table->double('height')->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('inventory');
    }
}
