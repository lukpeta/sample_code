<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CalculatePricePackageResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ofert_type' => $this->companyDetails->settings['ofert_type'],
            'price_size_1' => $this->companyDetails->settings['package_price_1'],
            'price_size_2' => $this->companyDetails->settings['package_price_2'],
            'price_size_3' => $this->companyDetails->settings['package_price_3'],
            'status' => 1
        ];
    }
}
