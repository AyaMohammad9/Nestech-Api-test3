<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Comment extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'comment_id' => $this->id,
            'comment_content' => $this->content,
            'auther' => $this->auther 
        ];
    }
}
