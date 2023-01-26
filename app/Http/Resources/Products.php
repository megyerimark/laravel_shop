<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Products extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "itemNumber"=>$this->itemNumber,
            "quantity"=>$this->quantity,
            "price"=>$this->price,
        ];
        



    }
}
