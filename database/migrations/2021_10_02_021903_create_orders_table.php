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
            $table->text('street_address');
            $table->text('apartment')->nullable();
            $table->text('city');
            $table->text('state');
            $table->string('country_code');
            $table->text('zip');
            $table->string('phone_number');
            $table->text('email');
            $table->string('name');
            $table->string('order_status');
            $table->text('payment_ref')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('payment_amount_cents')->default(0);
            $table->integer('ship_charged_cents')->default(0);
            $table->integer('ship_cost_cents')->default(0);
            $table->integer('subtotal_cents')->default(0);
            $table->integer('tax_total_cents')->default(0);
            $table->integer('total_cents')->default(0);
            $table->text('shipper_name')->nullable();
            $table->text('tracking_number')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('shipped_date')->nullable();
            $table->timestamps();

            $table->index([
                'street_address',
                'phone_number',
                'email',
                'name',
                'order_status',
                'payment_ref',
                'transaction_id',
                'tracking_number',
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
        Schema::dropIfExists('orders');
    }
}
