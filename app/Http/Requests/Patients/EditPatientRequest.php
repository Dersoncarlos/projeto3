<?php

namespace App\Http\Requests\Patients;

use App\Rules\ValidCNSRule;
use App\Rules\ValidCPFRule;
use Illuminate\Foundation\Http\FormRequest;

class EditPatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function prepareForValidation()
    {

        $this->merge([
            ...$this->all(),
            'cpf' => toOnlyNumbers($this->get('cpf')),
            'cns' => toOnlyNumbers($this->get('cns')),
            'address' => [
                ...$this->input('address'),
                'zipcode' => toOnlyNumbers($this->input('address.zipcode'))
            ]
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => ['required', new ValidCPFRule, 'unique:patients,cpf,' . $this->route("patientId")],
            'photo' => ['required', 'mimes:png,jpg,jpeg'],
            'full_name' => ['required'],
            'mother_full_name' => ['required'],
            'birthday' => ['required'],
            'cns' => ['required', new ValidCNSRule, 'unique:patients,cns,' . $this->route("patientId")],
            'address.zipcode' => ['required'],
            'address.address' => ['required'],
            'address.number' => ['required'],
            'address.neighborhood' => ['required'],
            'address.city' => ['required'],
            'address.state' => ['required'],
            'address.complement' => ['required']
        ];
    }
}
