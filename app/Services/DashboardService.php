<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class DashboardService
{
    public $default_cache_ttl = 600;

    public function summaryData($userId)
    {
        return [
            'totalOrderCount' => $this->totalOrderCount($userId),
            'totalSalesAmount' => $this->totalSalesAmount($userId),
            'avgOrderAmount' => $this->avgOrderAmount($userId),
        ];
    }

    public function totalOrderCount($userId)
    {
        return Cache::remember('totalOrderCount-' . $userId, $this->default_cache_ttl, function () use ($userId) {
            return Order::join('products', 'orders.product_id', '=', 'products.id')
                ->whereUserId($userId)
                ->count();
        });
    }

    public function totalSalesAmount($userId)
    {
        return Cache::remember('totalSalesAmount-' . $userId, $this->default_cache_ttl, function () use ($userId) {
            return Order::join('products', 'orders.product_id', '=', 'products.id')
                ->whereUserId($userId)
                ->sum('total_cents');
        });
    }

    public function avgOrderAmount($userId)
    {
        return Cache::remember('avgOrderAmount-' . $userId, $this->default_cache_ttl, function () use ($userId) {
            return Order::join('products', 'orders.product_id', '=', 'products.id')
                ->whereUserId($userId)
                ->avg('total_cents');
        });
    }
}
