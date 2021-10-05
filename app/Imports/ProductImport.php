<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return (new Product([
            'product_name' => $row['product_name'],
            'description' => $row['description'],
            'style' => $row['style'],
            'brand' => $row['brand'],
            'url' => $row['url'],
            'product_type' => $row['product_type'],
            'shipping_price' => $row['shipping_price'],
            'note' => $row['note'],
        ]))->forceFill([
            'id' => $row['id'],
            'user_id' => $row['admin_id'],
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
