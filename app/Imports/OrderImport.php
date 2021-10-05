<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return (new Order([
            'product_id' => $row['product_id'],
            'street_address' => $row['street_address'],
            'apartment' => $row['apartment'],
            'city' => $row['city'],
            'state' => $row['state'],
            'country_code' => $row['country_code'],
            'zip' => $row['zip'],
            'phone_number' => $row['phone_number'],
            'email' => $row['email'],
            'name' => $row['name'],
            'order_status' => $row['order_status'],
            'payment_ref' => $row['payment_ref'] != 'NULL' ? $row['payment_ref'] : null,
            'transaction_id' => $row['transaction_id'] != 'NULL' ? $row['transaction_id'] : null,
            'payment_amt_cents' => (int)$row['payment_amt_cents'],
            'ship_charged_cents' => (int)$row['ship_charged_cents'],
            'ship_cost_cents' => (int)$row['ship_cost_cents'],
            'subtotal_cents' => (int)$row['subtotal_cents'],
            'tax_total_cents' => (int)$row['tax_total_cents'],
            'total_cents' => (int)$row['total_cents'],
            'shipper_name' => $row['shipper_name'],
            'tracking_number' => $row['tracking_number'],
            'payment_date' => $row['payment_date'],
            'shipped_date' => $row['shipped_date'],
        ]))->forceFill([
            'id' => $row['id'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
