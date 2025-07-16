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
			'date_of_birth',
			'email',
			'mobile',
			'company',
			'website',
			'position',
			'type',
			'hotline',
			'miles',
			'country',
			'city',
			'postcode',
			'passport_nb',
			'issuance_date',
			'expiry_date',
			'comment',
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
			$client->date_of_birth,
			$client->email,
			$client->mobile,
			$client->company,
			$client->website,
			$client->position,
			$client->type,
			$client->hotline,
			$client->miles,
			$client->country,
			$client->city,
			$client->postcode,
			$client->passport_nb,
			$client->issuance_date,
			$client->expiry_date,
			$client->comment,
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
						
		if(isset($this->filters['gender']))
            $clientQuery->where('gender', $this->filters['gender']);
				
		if(isset($this->filters['date_of_birth']))
            $clientQuery->where('date_of_birth', $this->filters['date_of_birth']);
		
		if(isset($this->filters['email']))
            $clientQuery->where('email', $this->filters['email']);
		
		if(isset($this->filters['mobile']))
            $clientQuery->where('mobile', $this->filters['mobile']);
		
		if(isset($this->filters['company']))
            $clientQuery->where('company', $this->filters['company']);
		
		if(isset($this->filters['type']))
            $clientQuery->where('type', $this->filters['type']);
		
		if(isset($this->filters['country']))
            $clientQuery->where('country', $this->filters['country']);

        return $clientQuery;
		//return Client::orderBy('created_at', 'DESC');
    }
}
