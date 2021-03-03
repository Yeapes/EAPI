<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'price' => $this->price,
            'totalPrice' => round(( 1 - ($this->discount/100)) * $this->price,2),
            'rating' => $this->reviews->count() > 0? round($this->reviews->sum('star')/$this->reviews->count()) : 'No rating yet',
            'discount' => $this->discount,
            'href' => [
                'link' => route('products.show',$this->id)
            ]
        ];
    }
}
