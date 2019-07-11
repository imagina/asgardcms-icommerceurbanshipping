<?php

namespace Modules\Icommerceurbanshipping\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Icommerceurbanshipping\Repositories\MapAreaRepository;
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Repositories
use Modules\Icommerceurbanshipping\Repositories\IcommerceurbanshippingRepository;
use Modules\Icommerce\Repositories\ShippingMethodRepository;

class IcommerceUrbanshippingApiController extends BaseApiController
{

    private $icommerceurban;
    private $shippingMethod;
    private $mapArea;
   
    public function __construct(
        IcommerceurbanshippingRepository $icommerceurban,
        ShippingMethodRepository $shippingMethod,
        MapAreaRepository $mapArea
    ){
        $this->icommerceurban = $icommerceurban;
        $this->shippingMethod = $shippingMethod;
        $this->mapArea = $mapArea;
    }
    
    
     /**
     * Init data
     * @param Requests request
     * @param Requests array products - items (object)
     * @param Requests array products - total
     * @param Requests array options - areaMapId
     * @return mixed
     */
    public function init(Request $request){

      try {
          $data = $request->all();
            // Configuration
            $shippingName = config('asgard.icommerceurbanshipping.config.shippingName');
            $attribute = array('name' => $shippingName);
            $shippingMethod = $this->shippingMethod->findByAttributes($attribute);
      
            $areaMap = $this->mapArea->findByAttributes(["name" => $data["options"]->shipping_method  ?? ""]);
            $response = $this->icommerceurban->calculate($data,$shippingMethod->options,$areaMap);

          } catch (\Exception $e) {
            //Message Error
            $status = 500;
            $response = [
              'errors' => $e->getMessage()
            ];
        }

        return response()->json($response, $status ?? 200);

    }
    
    

}