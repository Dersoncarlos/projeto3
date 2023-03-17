<?php

namespace App\Http\Controllers\Patients;

use App\Actions\Patients\DeletePatient;
use App\Traits\JsonResponse;

class DeletePatientController
{
    use JsonResponse;

    public function __invoke(int $patientId, DeletePatient $deletePatient)
    {
        try {

            $deletePatient->execute($patientId);

            return $this->ok(null);
        } catch (\Exception $error) {
            return $this->fail($error);
        }
    }
}
