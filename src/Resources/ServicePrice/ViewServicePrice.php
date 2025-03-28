<?php

namespace Hanafalah\ModuleService\Resources\ServicePrice;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewServicePrice extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $props = $this->getPropsData();

        $arr = [
            'id'                     => $this->id,
            'current'                => $this->current,
            'parent_id'              => $this->parent_id,
            'service_id'             => $this->service_id,
            'service'                => $this->relationValidation('service', function () {
                return $this->service->toViewApi();
            }),
            'service_item_id'        => $this->service_item_id,
            'service_item_type'      => $this->service_item_type,
            'service_item'           => $this->relationValidation('serviceItem', function () {
                return $this->serviceItem->toViewApi();
            }),
            'price'                  => $this->price
        ];

        foreach ($props as $key => $value) $arr[$key] = $value;
        // Sort array by keys
        return $arr;
    }
}
