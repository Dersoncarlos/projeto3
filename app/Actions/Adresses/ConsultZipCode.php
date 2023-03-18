<?php

namespace App\Actions\Adresses;

use App\Services\ViaCepService;
use Illuminate\Support\Facades\Cache;

class ConsultZipCode
{
    public function __construct()
    {
    }

    public static function execute(string|int $zipcode)
    {
        $address = Cache::remember("zipcode_{$zipcode}", 3600, function () use ($zipcode) {

            $viaCep =  new ViaCepService();

            return $viaCep->find($zipcode);
        });

        return $address;
    }
}
