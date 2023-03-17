<?php

namespace App\Http\Controllers\Patients;

use App\Http\Requests\Patients\EditPatientRequest;
use App\Traits\JsonResponse;

class EditPatientController
{
    use JsonResponse;

    public function __invoke(EditPatientRequest $request)
    {
        try {
            dd($request->all());

            return $this->ok(null);
        } catch (\Exception $error) {
            return $this->fail($error);
        }
    }
}
