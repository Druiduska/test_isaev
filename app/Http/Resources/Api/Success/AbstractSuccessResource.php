<?php

namespace App\Http\Resources\Api\Success;

use App\Http\Resources\Api\AbstractResponseResource;
use OpenApi\Annotations as OA;


/**
 * @OA\Schema(
 *     schema="AbstractSuccessResource",
 *
 *      @OA\Property(property="result", type="string", example="SOME SLUG", description="Slug Ответа"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="data", type="array", description="Данные",
 *          @OA\Items(
 *              type="object"
 *          ),
 *      ),
 * )
 */
class AbstractSuccessResource extends AbstractResponseResource
{
    public const RESULT = '';

    /**
     * @param $resource
     * @param mixed|null $data
     */
    public function __construct($resource, mixed $data = null)
    {
        parent::__construct($resource, $data);
        if (is_null($data)) {
            if (is_iterable($this->resource)) {
                $this->data = array_map(
                    fn($item) => array_filter(
                        $item ?? []
                    ),
                    $this->resource
                );
            } elseif ($this->resource) {
                $this->data = array_filter($this->resource->toArray() ?? []);
            }
        }
    }
}
