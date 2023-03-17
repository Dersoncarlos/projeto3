<?php

namespace App\Actions\Patients;

use App\Models\Patient;

class GetPatientByCPF
{
    public static function execute(string $cpf)
    {
        $patient = Patient::where('cpf', toOnlyNumbers($cpf))->first();

        if (empty($patient)) {
            throw new \Exception("Patient not found", 404);
        }

        return $patient->load(['address']);
    }
}
