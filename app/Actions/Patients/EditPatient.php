<?php

namespace App\Actions\Patients;

use App\Http\Requests\Patients\EditPatientRequest;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class EditPatient
{

    public static function execute(int $patientId, EditPatientRequest $request): void
    {
        $patient = Patient::find($patientId);

        if (empty($patient)) {
            throw new \Exception("Patient not found", 404);
        }

        $photo = $request->file("photo")->store("user/{$patient->id}", ['disk' => 'public']);

        try {
            DB::beginTransaction();

            $patient->fill([...$request->all(), ...compact("photo")])->save();
            $patient->address()->update($request->address);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
