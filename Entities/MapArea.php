<?php

namespace Modules\Icommerceurbanshipping\Entities;

use Illuminate\Database\Eloquent\Model;

class MapArea extends Model
{
  
  protected $table = 'icommerceurbanshipping__mapareas';
  
  protected $fillable = [
    'name',
    'polygon',
    'store_id',
    'price',
    'minimum',
  ];
  
  protected $fakeColumns = ['options'];
  
  protected $casts = [
    'options' => 'array'
  ];
  
  public function store()
  {
    return $this->belongsTo(Store::class);
  }
  
}
