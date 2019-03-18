<?php

namespace App\Http\Resources;


class PermissionCollection extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'permissions' => $this->collection
        ];
    }
}