<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'actions' => [
                'edit' => route('sellers.edit', $this->id),
                'delete' => route('api.sellers.delete', $this->id),
                'comission' => route('api.sellers.sales.patch', $this->id),
            ],
        ];
    }
}
