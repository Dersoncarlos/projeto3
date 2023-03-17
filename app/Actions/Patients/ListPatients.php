<?php

namespace App\Actions\Patients;

use App\Models\Patient;

class ListPatients
{
    public function __construct(private Patient $_patientModel)
    {
    }

    public function execute()
    {
        return $this->_patientModel->with(['address'])->get();
    }
}
