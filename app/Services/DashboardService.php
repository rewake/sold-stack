<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class DashboardService
{
    public $default_cache_ttl = 600;

    public function summaryData()
    {
        return [
            'totalOrderCount' => $this->totalOrderCount(),
            'totalSalesAmount' => $this->totalSalesAmount(),
            'avgOrderAmount' => $this->avgOrderAmount(),
            'totalUserCount' => $this->totalUserCount(),
        ];
    }

    public function totalOrderCount()
    {
        return Cache::remember('totalOrderCount', $this->default_cache_ttl, function () {
            return Order::count();
        });
    }

    public function totalSalesAmount()
    {
        return Cache::remember('totalSalesAmount', $this->default_cache_ttl, function () {
            return Order::sum('total_cents') / 100;
        });
    }

    public function avgOrderAmount()
    {
        return Cache::remember('avgOrderAmount', $this->default_cache_ttl, function () {
            return Order::avg('total_cents') / 100;
        });
    }

    public function totalUserCount()
    {
        return Cache::remember('totalUserCount', $this->default_cache_ttl, function () {
            return User::count();
        });
    }
}
