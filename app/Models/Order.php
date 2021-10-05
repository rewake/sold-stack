<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $product_id
 * @property string $street_address
 * @property string|null $apartment
 * @property string|null $city
 * @property string $state
 * @property string $country_code
 * @property string $zip
 * @property string $phone_number
 * @property string $email
 * @property string $name
 * @property string $order_status
 * @property string|null $payment_ref
 * @property string|null $transaction_id
 * @property int $payment_amt_cents
 * @property int $ship_charged_cents
 * @property int $ship_cost_cents
 * @property int $subtotal_cents
 * @property int $tax_total_cents
 * @property int $total_cents
 * @property string|null $shipper_name
 * @property string|null $tracking_number
 * @property \Illuminate\Support\Carbon|null $payment_date
 * @property \Illuminate\Support\Carbon|null $shipped_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereApartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentAmtCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipChargedCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipCostCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipperName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStreetAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubtotalCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTaxTotalCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTrackingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereZip($value)
 * @mixin \Eloquent
 */
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
        'payment_amount_cents' => MoneyCast::class,
        'ship_charged_cents' => MoneyCast::class,
        'ship_cost_cents' => MoneyCast::class,
        'subtotal_cents' => MoneyCast::class,
        'tax_total_cents' => MoneyCast::class,
        'total_cents' => MoneyCast::class,
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
