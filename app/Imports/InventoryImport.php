<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InventoryImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return (new Inventory([
            'product_id' => $row['product_id'],
            'sku' => $row['sku'],
            'quantity' => $row['quantity'],
            'color' => $row['color'],
            'size' => $row['size'],
            'weight' => $row['weight'],
            'price_cents' => $row['price_cents'],
            'sale_price_cents' => $row['sale_price_cents'],
            'cost_cents' => $row['cost_cents'],
            'length' => $row['length'],
            'width' => $row['width'],
            'height' => $row['height'],
            'note' => $row['note'],
        ]))->forceFill([
            'id' => $row['id'],
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
