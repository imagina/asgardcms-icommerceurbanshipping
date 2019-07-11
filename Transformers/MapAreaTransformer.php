<?php

namespace Modules\Icommerceurbanshipping\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Icommerce\Transformers\StoreTransformer;

class MapAreaTransformer extends Resource
{
  public function toArray($request)
  {
    $data = [
      'id' => $this->when($this->id, $this->id),
      'name' => $this->when($this->name, $this->name),
      'price' => $this->when($this->price, $this->price),
      
      'minimum' => $this->when($this->minimum, $this->minimum),
      'store' => new StoreTransformer($this->whenLoaded('store')),
      'polygon' => $this->when($this->polygon, json_decode($this->polygon)),
    ];
    return $data;
  }
}
