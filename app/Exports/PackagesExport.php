<?php

namespace App\Exports;

use App\Package;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PackagesExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
   use Exportable;

    public function headings(): array
    {
        return [
            'name', 
            'from', 
            'to', 
			'client',
            'price'
        ];
    }

    public function map($package): array
    {
        return [
            $package->name,
            $package->from,
            $package->to,
			$package->client->full_name,
            $package->price
        ];
    }

    public function query()
    {
        return Package::orderBy('created_at', 'DESC');
    }
}

