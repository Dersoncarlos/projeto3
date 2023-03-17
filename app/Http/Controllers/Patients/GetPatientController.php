<?php

namespace App\Http\Controllers\Patients;

use App\Actions\Patients\GetPatientByCPF;
use App\Traits\JsonResponse;

class GetPatientController
{
    use JsonResponse;

    public function __invoke(string $cpf, GetPatientByCPF $getPatient)
    {
        try {
            $patient = $getPatient->execute($cpf);

            return $this->ok($patient);
        } catch (\Exception $error) {
            return $this->fail($error);
        }
    }
}
