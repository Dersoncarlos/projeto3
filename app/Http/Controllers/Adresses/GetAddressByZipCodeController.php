<?php

namespace App\Http\Controllers\Adresses;

use App\Actions\Adresses\ConsultZipCode;
use App\Traits\JsonResponse;

class GetAddressByZipCodeController
{
    use JsonResponse;

    public function __invoke(string|int $cep)
    {
        try {
            $response = ConsultZipCode::execute($cep);

            return $this->ok($response);
        } catch (\Exception $error) {
            return $this->fail($error);
        }
    }
}
