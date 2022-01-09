<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Inventory::all();
    }

    public function headings(): array
    {
        return ["id", "name", "description", "cost", "quantity", "created_at", "updated_at"];
    }
}