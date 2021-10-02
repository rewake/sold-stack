<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'street_address',
        'apartment',
        'city',
        'state',
        'country_code',
        'zip',
        'phone_number',
        'email',
        'name',
        'order_status',
        'payment_ref',
        'transaction_id',
        'payment_amount_cents',
        'ship_charged_cents',
        'ship_cost_cents',
        'subtotal_cents',
        'tax_total_cents',
        'total_cents',
        'shipper_name',
        'tracking_number',
        'payment_date',
        'shipped_date',
    ];

    protected $casts = [
        'payment_date' => 'datetime',
        'shipped_date' => 'datetime',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
