<?php

namespace App\Http\Resources;
use App\Models\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class AppraisalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $employee = Employee::find($this->employee_id);
        $fullname = $employee->first_name. " " . $employee->last_name;
        return [
            "Id" => $this->id,
            "Full Name" => $fullname,
            "First Appointment" => $this->first_appointment,
            "Present Appointment" => $this->present_appointment,
            "Date" => $this->ap_date
        ];
    }
}
