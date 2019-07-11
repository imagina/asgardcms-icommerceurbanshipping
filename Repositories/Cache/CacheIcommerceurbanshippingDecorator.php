<?php

namespace Modules\Icommerceurbanshipping\Repositories\Cache;

use Modules\Icommerceurbanshipping\Repositories\IcommerceurbanshippingRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheIcommerceurbanshippingDecorator extends BaseCacheDecorator implements IcommerceurbanshippingRepository
{
    public function __construct(IcommerceurbanshippingRepository $icommerceurbanshipping)
    {
        parent::__construct();
        $this->entityName = 'icommerceurbanshipping.icommerceurbanshippings';
        $this->repository = $icommerceurbanshipping;
    }

    /**
     * List or resources
     *
     * @return mixed
     */
    public function calculate($parameters,$conf)
    {
        return $this->remember(function () use ($parameters,$conf) {
            return $this->repository->calculate($parameters,$conf);
        });
    }

}
