<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'CategoryID' => $this->CategoryID,
            'CategoryName' => $this->CategoryName,
            'Description' => $this->Description,
            'CreatedDate' => $this->CreatedDate,
            'UpdatedDate' => $this->UpdatedDate,
        ];
    }
}
