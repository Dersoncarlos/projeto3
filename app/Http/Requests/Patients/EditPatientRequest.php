<?php

namespace App\Http\Requests\Patients;

use App\Rules\ValidCNSRule;
use App\Rules\ValidCPFRule;


class EditPatientRequest extends CreatePatientRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            ...parent::rules(),
            'cpf' => ['required', new ValidCPFRule, 'unique:patients,cpf,' . $this->route("patientId")],
            'cns' => ['required', new ValidCNSRule, 'unique:patients,cns,' . $this->route("patientId")],
        ];
    }
}
