<?php

namespace App\Actions\Patients;

use App\Models\Patient;
use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreatePatients
{

    public static function execute(FormRequest $request)
    {
        try {
            DB::beginTransaction();
            $patient = Patient::create($request->all());

            $photo = $request->file("photo")->store("user/{$patient->id}", ['disk' => 'public']);

            $patient->photo = $photo;


            $patient->address()->save(new Address($request->address));

            $patient->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
