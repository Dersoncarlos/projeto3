<?php

namespace App\Actions\Patients;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;

class CreatePatients
{
    public function __construct(private Patient $_patientModel) {}

    public static function execute(FormRequest $request): void
    {

        $photo = $request->file('photo');

        $data = $request->all();
        $data['photo'] = 'url_img';

        $saved = Patient::save($data);

        if (!boolval($saved)) {
            throw new \Exception("save patient", 200);
        }
    }
}
