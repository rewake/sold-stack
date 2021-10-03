<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * App\Models\Inventory
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $sku
 * @property int $quantity
 * @property string|null $color
 * @property string|null $size
 * @property float $weight
 * @property int $price_cents
 * @property int $sale_price_cents
 * @property int $cost_cents
 * @property float $length
 * @property float $width
 * @property float $height
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereCostCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory wherePriceCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereSalePriceCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereWidth($value)
 * @mixin \Eloquent
 */
class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $fillable = [
        'product_id',
        'sku',
        'quantity',
        'color',
        'size',
        'weight',
        'price_cents',
        'sale_price_cents',
        'cost_cents',
        'length',
        'width',
        'height',
        'note',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, Product::class);
    }
}
