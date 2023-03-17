<?php

namespace App\Actions\Patients;

use App\Models\Patient;

class DeletePatient
{

    public static function execute(int $patientId): void
    {
        $isDeleted = Patient::destroy($patientId);

        if (!$isDeleted) {
            throw new \Exception("Unable to remove patient", 400);
        }
    }
}
