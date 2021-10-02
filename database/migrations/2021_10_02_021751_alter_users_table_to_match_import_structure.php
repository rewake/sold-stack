<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableToMatchImportStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('superadmin')->after('remember_token')->default(0);
            $table->string('shop_name')->after('superadmin');
            $table->string('card_brand')->after('shop_name')->nullable();
            $table->string('card_last_four')->after('card_brand')->nullable();
            $table->string('shop_domain')->after('card_last_four')->nullable();
            $table->string('billing_plan')->after('shop_domain')->nullable();
            $table->boolean('is_enabled')->after('billing_plan')->default(0);
            $table->timestamp('trial_starts_at')->after('is_enabled')->nullable();
            $table->timestamp('trial_ends_at')->after('trial_starts_at')->nullable();

            $table->index('name');
            $table->index('billing_plan');
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
            $table->dropColumn([
                'superadmin',
                'shop_name',
                'card_brand',
                'card_last_four',
                'shop_domain',
                'billing_plan',
                'is_enabled',
                'trial_starts_at',
                'trial_ends_at',
            ]);
        });
    }
}
