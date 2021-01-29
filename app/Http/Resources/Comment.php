<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
//            'id' => $this->id,
//            'description' => $this->description,
//            //'user' => '/api/users/' . $this->user_id,
//            'Sub_Categories' => "/api/sub_categories/" . $this->categories_id,

            'id' => $this->id,
            'description' => $this->description,
            'user' => "/api/users".$this->user_id,
            'article' => "/api/articles".$this->article_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
