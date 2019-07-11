<?php

namespace Modules\Icommerceurbanshipping\Repositories\Eloquent;

use Modules\Icommerceurbanshipping\Entities\MapArea;
use Modules\Icommerceurbanshipping\Repositories\IcommerceurbanshippingRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Icommerceurbanshipping\Transformers\MapAreaTransformer;

class EloquentIcommerceurbanshippingRepository extends EloquentBaseRepository implements IcommerceurbanshippingRepository
{

    function calculate($parameters,$conf, $areaMap){

        if($areaMap!=null){

            $shippingValue = $areaMap->price;
        
            if($shippingValue!=null){

                $response["status"] = "success";
                $response["items"] = MapAreaTransformer::collection(MapArea::all());
                $response["price"] = $shippingValue;
                $response["priceshow"] = false;

            }else{
                
                $response =[
                    'status' => 'error',
                    'msj' => trans('icommerceurbanshipping::icommerceurbanshippings.messages.not shipping value')
                ];

            }

        }else{

            $response =[
                'status' => 'error',
                'msj' => trans('icommerceurbanshipping::icommerceurbanshippings.messages.msjini')
            ];

        }
        

        /*
        $areaMapId = isset($parameters["options"]["areaMapId"]) ? $parameters["options"]["areaMapId"] : null;
        
        if($areaMapId!=null){

            $items = json_decode($parameters["products"]["items"]);
            $total = json_decode($parameters["products"]["total"]);
           
            $result = app("Modules\Icommerce\Repositories\MapAreaRepository")->find($areaMapId);
            
            if(count($result)>0){

                if($total>=$result->minimum){
                    $response =[
                        'status' => 'success',
                        'items' => null,
                        'price' => $result->price,
                        'priceshow' => true
                    ]; 
                }else{
                    $response =[
                        'status' => 'error',
                        'msj' => trans('icommerceurbanshipping::icommerceurbanshippings.messages.min')." ".$result->minimum
                    ];  
                }

            }else{

                $response =[
                    'status' => 'error',
                    'msj' => trans('icommerceurbanshipping::icommerceurbanshippings.messages.msjini')
                ];

            }

        }else{
            $response =[
                'status' => 'error',
                'msj' => trans('icommerceurbanshipping::icommerceurbanshippings.messages.msjini')
            ];
        }
        */


        return $response;

    }

}
