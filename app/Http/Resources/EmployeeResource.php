<?php

namespace App\Http\Resources;

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
        //return parent::toArray($request);
        return [
            'data'=>[
                'id'=>(string)$this->id,
                'empl_type'=>'contractual',
                'attrib'=>[
                    'name'=>$this->name,
                    'joining_date'=>$this->created_at,
                ]
            ]
        ];
    }
}
