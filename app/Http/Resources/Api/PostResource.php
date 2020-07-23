<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'type' => 'posts',
            'id'=> (string)$this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'body' => $this->body,
                'feature_image' => $this->image_url,
                'author' =>auth()->user()->firstname . ',' . auth()->user()->lastname
            ],
            'meta' =>[
                'version' => '1.0.0',
                'author_url' => 'www.digizigs.com'
            ]
        ];
    }

}
