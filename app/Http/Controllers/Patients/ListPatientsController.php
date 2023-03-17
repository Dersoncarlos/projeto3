<?php

namespace App\Http\Controllers\Patients;

use App\Actions\Patients\ListPatients;
use App\Traits\JsonResponse;

class ListPatientsController
{
    use JsonResponse;

    public function __invoke()
    {
        try {
            $patients = ListPatients::execute();

            return $this->ok($patients);
        } catch (\Exception $error) {
            return $this->fail($error);
        }
    }
}
