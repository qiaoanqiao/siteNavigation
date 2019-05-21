<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
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
            $row = [];
            $cards = (new CardCollection($item->cards));
            $rowNum = 1;
            foreach($cards as $card) {
                $row[$rowNum][] = $card;
                if(count($row[$rowNum]) === 4) { //每行显示4个卡片
                    $rowNum++;
                }
            }
            return [
                'id'        => $item->id,
                'title'     => $item->title,
                'icon'      => $item->icon,
                'udid'      => $item->udid,
                'parent_id' => $item->parent_id,
                'children'   => [],
                'row' => $row,

            ];
        })->toArray();
    }
}
