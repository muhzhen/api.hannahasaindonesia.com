<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'reading_time' => $this->reading_time,
            'thumbnail' => $this->thumbnail,
            'title' => $this->title,
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $this->slug,
            'tanggal' => $this->tanggal,
        ];
    }


}
