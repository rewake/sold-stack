<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return (new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password_plain']),
            'superadmin' => $row['superadmin'],
            'shop_name' => $row['shop_name'],
            'card_brand' => $row['card_brand'],
            'card_last_four' => $row['card_last_four'],
            'shop_domain' => $row['shop_domain'],
            'billing_plan' => $row['billing_plan'],
            'is_enabled' => $row['is_enabled'],
            'trial_starts_at' => $row['trial_starts_at'],
            'trial_ends_at' => $row['trial_ends_at'],
        ]))->forceFill([
            'id' => $row['id'],
            'email_verified_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
