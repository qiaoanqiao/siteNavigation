<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CardCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item, $key) {
            return [
                "id"       => 19,
                "title"    => $item->title,
                "describe" => $item->describe,
                "url"      => $item->url,
                "icon"     => $item->icon,
                "logo"     => $item->logo,
                "label"    => $item->label,
                "like"     => $item->like,
                "reco"     => $item->reco,
            ];
        })->toArray();
    }
}
