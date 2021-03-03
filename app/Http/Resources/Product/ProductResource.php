<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0? 'out of stock' : $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round(( 1 - ($this->discount/100)) * $this->price,2),
            'reviews' => $this->reviews->count() > 0? round($this->reviews->sum('star')/$this->reviews->count()) : 'No rating yet',
            'href' => [
                'reviews' => route('reviews.index',$this->id)
            ]
        ];
    }
}
