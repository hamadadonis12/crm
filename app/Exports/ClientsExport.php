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
   
    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function headings(): array
    {
        return [
            'fullname', 
            'gender', 
            'email',
			'mobile',
			'company',
            'total_packages', 
            'total_price', 
            'points_earned'
        ];
    }

    public function map($client): array
    {
        return [
            $client->fullname,
            $client->gender,
            $client->email,
			$client->mobile,
			$client->company,
            $client->total_packages,
            $client->total_price,
            $client->points_earned,
        ];
    }

    public function query()
    {
		$clientQuery = Client::query();

        if(isset($this->filters['fullname']))
            $clientQuery->where('fullname', $this->filters['fullname']);
		
		if(isset($this->filters['email']))
            $clientQuery->where('email', $this->filters['email']);
		
		if(isset($this->filters['mobile']))
            $clientQuery->where('mobile', $this->filters['mobile']);
		
		if(isset($this->filters['company']))
            $clientQuery->where('company', $this->filters['company']);
	
        return $clientQuery;
		//return Client::orderBy('created_at', 'DESC');
    }
}
