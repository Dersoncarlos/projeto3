<?php

namespace App\Http\Controllers\Patients;

use App\Actions\Patients\CreatePatients;
use App\Http\Requests\Patients\CreatePatientRequest;
use App\Traits\JsonResponse;

class CreatePatientsController
{
    use JsonResponse;

    public function __invoke(CreatePatientRequest $createPatientRequest )
    {
        try {

            $patients = CreatePatients::execute($createPatientRequest);
            return $this->ok($patients);
        } catch (\Exception $error) {
            return $this->fail($error);
        }
    }
}
