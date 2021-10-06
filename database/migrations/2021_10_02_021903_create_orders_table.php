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
            $table->foreignId('product_id')->constrained();
            $table->integer('inventory_id')
                ->foreign('inventory_id')
                ->references('id')
                ->on('inventory');
            $table->string('street_address'); // using string instead of text
            $table->string('apartment')->nullable(); // using string instead of text
            $table->string('city')->nullable(); // using string instead of text
            $table->string('state'); // using string instead of text
            $table->string('country_code');
            $table->text('zip');
            $table->string('phone_number');
            $table->string('email'); // using string instead of text
            $table->string('name');
            $table->string('order_status');
            $table->string('payment_ref')->nullable(); // using string instead of text
            $table->string('transaction_id')->nullable();
            $table->integer('payment_amt_cents')->default(0);
            $table->integer('ship_charged_cents')->default(0);
            $table->integer('ship_cost_cents')->default(0);
            $table->integer('subtotal_cents')->default(0);
            $table->integer('tax_total_cents')->default(0);
            $table->integer('total_cents')->default(0);
            $table->text('shipper_name')->nullable();
            $table->string('tracking_number')->nullable(); // using string instead of text
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('shipped_date')->nullable();
            $table->timestamps();

            $table->index('street_address');
            $table->index('phone_number');
            $table->index('email');
            $table->index('name');
            $table->index('order_status');
            $table->index('payment_ref');
            $table->index('transaction_id');
            $table->index('tracking_number');
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
