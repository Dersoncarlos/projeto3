<?php

namespace App\Http\Controllers\Patients;

use App\Actions\Patients\EditPatient;
use App\Http\Requests\Patients\EditPatientRequest;
use App\Traits\JsonResponse;

class EditPatientController
{
    use JsonResponse;

    public function __invoke(int $patientId, EditPatientRequest $request)
    {
        try {
            EditPatient::execute($patientId, $request);
            return $this->ok(null);
        } catch (\Exception $error) {
            return $this->fail($error);
        }
    }
}
