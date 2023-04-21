<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Employee;
class ApplicationResource extends JsonResource
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
            "Title" => $this->title,
            "Date" => $this->date
        ];
    }
}
