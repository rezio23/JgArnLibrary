<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'BookID' => $this->BookID,
            'BookName' => $this->BookName,
            'CategoryID' => $this->CategoryID,
            'CategoryName' => $this->whenLoaded('category', fn () => $this->category->CategoryName),
            'Qty' => $this->Qty,
            'Description' => $this->Description,
            'CreatedDate' => $this->CreatedDate,
            'UpdatedDate' => $this->UpdatedDate,
        ];
    }
}
