<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $postContent =  $request->header('Accept-language') === 'en' ?
            $this->en_content :
            $this->ar_content;

        return [
            'post_id' => $this->id,
            'post_content' => $postContent,
            'auther' => $this->auther,
            'category' => new Category($this->category),
            'comments' => Comment::collection($this->whenLoaded('comments')),
            'images'=>PostImages::collection($this->whenLoaded('images'))
        ];
    }
}
