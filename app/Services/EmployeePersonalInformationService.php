<?php

namespace App\Services;

use App\Models\EmployeePersonalInformation;
use Illuminate\Http\Request;

class EmployeePersonalInformationService
{
    private $personalInformation;

    /**
     * @return EmployeePersonalInformation
     */
    public function getPersonalInformation(): EmployeePersonalInformation
    {
        return $this->personalInformation;
    }

    /**
     * @param EmployeePersonalInformation $personalInformation
     */
    public function setPersonalInformation(EmployeePersonalInformation $personalInformation): void
    {
        $this->personalInformation = $personalInformation;
    }

    public function save(Request $request)
    {
        $this->personalInformation->employee_id = $request->employee_id;
        $this->personalInformation->birth_date = $request->birth_date;
        $this->personalInformation->civil_status = $request->civil_status;
        $this->personalInformation->gender = $request->gender;
        $this->personalInformation->nationality = $request->nationality;
        $this->personalInformation->blood_group_id = $request->blood_group_id;
        $this->personalInformation->education = $request->education;
        $this->personalInformation->identification_number = $request->identification_number;
        $this->personalInformation->wife_working_status = $request->wife_working_status;
        $this->personalInformation->degree_of_obstacle = $request->degree_of_obstacle;
        $this->personalInformation->number_of_child = $request->number_of_child;
        $this->personalInformation->education_status = $request->education_status;
        $this->personalInformation->last_completed_school = $request->last_completed_school;
        $this->personalInformation->address = $request->address;
        $this->personalInformation->home_phone_number = $request->home_phone_number;
        $this->personalInformation->city = $request->city;
        $this->personalInformation->postal_code = $request->postal_code;
        $this->personalInformation->bank_name = $request->bank_name;
        $this->personalInformation->bank_account_type = $request->bank_account_type;
        $this->personalInformation->account_number = $request->account_number;
        $this->personalInformation->iban = $request->iban;
        $this->personalInformation->emergency_person = $request->emergency_person;
        $this->personalInformation->emergency_person_degree = $request->emergency_person_degree;
        $this->personalInformation->emergency_person_phone_number = $request->emergency_person_phone_number;
        $this->personalInformation->employee_id = $request->employee_id;

        $this->personalInformation->save();
    }
}
