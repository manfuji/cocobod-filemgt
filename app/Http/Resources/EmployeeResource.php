<?php

namespace App\Http\Resources;
use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "Id" => $this->id,
            "First Name" => $this->first_name,
            "Last Name" => $this->last_name,
            "Other Name" => $this->other_name,
            "Email" => $this->email,
            "Department" => $this->department
        ];
    }
}
