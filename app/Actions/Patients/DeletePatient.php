<?php

namespace App\Actions\Patients;

use App\Models\Patient;
use App\Models\User;

class DeletePatient
{
    public function __construct(private Patient $_patientModel)
    {
    }

    public function execute(int $patientId): void
    {
        $isDeleted = $this->_patientModel->destroy($patientId);

        if (!boolval($isDeleted)) {
            throw new \Exception("Unable to remove patient", 400);
        }
    }
}
