<?php

namespace App\Actions\Patients;

use App\Models\Patient;

class ListPatients
{
    public static function execute()
    {
        return Patient::with(['address'])->paginate(5);
    }
}
