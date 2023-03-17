<?php

namespace App\Actions\Patients;

use App\Models\Patient;

class GetPatientByCPF
{
    public function __construct(private Patient $_patientModel)
    {
    }

    public function execute(string $cpf)
    {
        $patient = $this->_patientModel->where('cpf', toOnlyNumbers($cpf))->first();

        if (empty($patient)) {
            throw new \Exception("Patient not found", 404);
        }

        return $patient->load(['address']);
    }
}
