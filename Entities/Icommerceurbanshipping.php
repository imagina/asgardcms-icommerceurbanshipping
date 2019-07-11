<?php

namespace Modules\Icommerceurbanshipping\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Icommerceurbanshipping extends Model
{
    use Translatable;

    protected $table = 'icommerceurbanshipping__icommerceurbanshippings';
    public $translatedAttributes = [];
    protected $fillable = [];
}
