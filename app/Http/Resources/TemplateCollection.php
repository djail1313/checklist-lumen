<?php


namespace App\Http\Resources;

class TemplateCollection extends CustomResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }

}
