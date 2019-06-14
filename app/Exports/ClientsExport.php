<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ClientsExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
   use Exportable;

    public function headings(): array
    {
        return [
            'firstname', 
            'lastname', 
            'gender', 
            'email',
            'total_packages', 
            'total_price', 
            'points_earned'
        ];
    }

    public function map($client): array
    {
        return [
            $client->firstname,
            $client->lastname,
            $client->gender,
            $client->email,
            $client->total_packages,
            $client->total_price,
            $client->points_earned,
        ];
    }

    public function query()
    {
        return Client::orderBy('created_at', 'DESC');
    }
}
