<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Image extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'user' => "/api/users".$this->user_id,
            'article' => "/api/articles".$this->article_id,
        ];
    }
}
