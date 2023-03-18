<?php

namespace App\Actions\Patients;

use App\Models\Patient;
use Illuminate\Http\Request;

class ListPatients
{
    public static function execute(Request $request)
    {
        $conditions = [];

        if (!empty($request->cpf)) {
            $conditions[] = ['cpf', 'like', '%' . toOnlyNumbers($request->cpf) . '%'];
        }

        if (!empty($request->name)) {
            $conditions[] = ['full_name', 'like', '%' . $request->name . '%'];
        }

        return Patient::with(['address'])->where($conditions)->paginate(5);
    }
}
