<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SweetAlertResource extends JsonResource
{
    /**
     * @const int
     */
    private const TIMER_CLOSE_MS = 3000;

    /**
     * @return object
     */
    private function resourceArrayToObject(): object
    {
        return (object) $this->resource;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $resource = $this->resourceArrayToObject();

        return [
            'title' => __($resource->title),
            'text' => __($resource->text),
            'icon' => $resource->icon,
            'buttons' => false,
            'timer' => SweetAlertResource::TIMER_CLOSE_MS
        ];
    }
}
