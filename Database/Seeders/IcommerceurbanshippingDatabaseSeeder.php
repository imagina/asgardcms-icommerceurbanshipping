<?php

namespace Modules\Icommerceurbanshipping\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Icommerce\Entities\ShippingMethod;

class IcommerceurbanshippingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $options['init'] = "Modules\Icommerceurbanshipping\Http\Controllers\Api\IcommerceUrbanshippingApiController";
        //$options['areas'] = "";

        $titleTrans = 'icommerceurbanshipping::icommerceurbanshippings.single';
        $descriptionTrans = 'icommerceurbanshipping::icommerceurbanshippings.description';

        foreach (['en', 'es'] as $locale) {

            if($locale=='en'){
                $params = array(
                    'title' => trans($titleTrans),
                    'description' => trans($descriptionTrans),
                    'name' => config('asgard.icommerceurbanshipping.config.shippingName'),
                    'status' => 0,
                    'options' => $options
                );

                $shippingMethod = ShippingMethod::create($params);
                
            }else{

                $title = trans($titleTrans,[],$locale);
                $description = trans($descriptionTrans,[],$locale);

                $shippingMethod->translateOrNew($locale)->title = $title;
                $shippingMethod->translateOrNew($locale)->description = $description;

                $shippingMethod->save();
            }

        }// Foreach

    }
}
