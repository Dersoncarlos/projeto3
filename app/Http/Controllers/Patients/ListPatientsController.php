<?php

namespace App\Http\Controllers\Patients;

use App\Actions\Patients\ListPatients;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;

class ListPatientsController
{
    use JsonResponse;

    public function __invoke(Request $request)
    {
        try {
            $patients = ListPatients::execute($request);

            return $this->ok($patients);
        } catch (\Exception $error) {
            return $this->fail($error);
        }
    }
}
