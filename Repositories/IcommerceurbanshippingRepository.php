<?php

namespace Modules\Icommerceurbanshipping\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface IcommerceurbanshippingRepository extends BaseRepository
{

    public function calculate($parameters,$conf,$areaMap);
    
}
