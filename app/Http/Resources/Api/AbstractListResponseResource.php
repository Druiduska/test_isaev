<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 */
abstract class AbstractListResponseResource extends AbstractJsonResource
{
    protected array $data;

    /**
     * @param $resource
     * @param mixed|null $data
     */
    public function __construct($resource, mixed $data = null)
    {
        if (is_array($data)) {
            $this->data = $data;
        } elseif ($data instanceof ResourceCollection) {
            $this->data = $data->toArray(request());
        } elseif ($data instanceof JsonResource) {
            $this->data = $data->toArray(request());
        } else {
            $this->data = [];
        }
        parent::__construct($resource);
    }
}
