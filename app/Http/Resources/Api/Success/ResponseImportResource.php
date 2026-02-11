<?php

namespace App\Http\Resources\Api\Success;

use App\Enums\ResponseSlug\ResponseSuccessSlugEnum as Slag;
use App\Http\Resources\Api\AbstractResponseResource;
use Illuminate\Http\Request;
/**
 * @OA\Schema(
 *     schema="ResponseImportResource",
 *
 *      @OA\Property(property="result", type="string", example="SUCCESS", description="Slug Ответа"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="data", type="array", description="Данные",
 *          @OA\Items(
 *              type="object"
 *          ),
 *      ),
 *      @OA\Property(property="errors", type="array", description="Ошибки",
 *           @OA\Items(
 *               type="object"
 *           ),
 *      ),
 * )
 */
class ResponseImportResource extends AbstractResponseResource
{
    public const Slag RESULT = Slag::SUCCESS;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'result' => self::RESULT,
            'request_uuid' => $this->requestUuid,
            'data' => $this->formatData($this->resource['data'] ?? []),
            'errors' => $this->formatErrors($this->resource['errors'] ?? []),
        ];
    }

    /**
     * Форматирует валидные данные.
     *
     * @param array $data
     * @return array
     */
    protected function formatData(array $data): array
    {
        return array_map(function ($item) {
            return array_filter([
                'id' => $item['id'] ?? null,
                'uuid_1c' => $item['uuid_1c'] ?? null,
                'uuid' => $item['uuid'] ?? null,
            ]);
        }, $data);
    }

    /**
     * Форматирует ошибки для вывода.
     *
     * @param array $errors
     * @return array
     */
    protected function formatErrors(array $errors): array
    {
        return array_map(function ($error) {
            return [
                'line_number' => $error['line_number'] ?? null,
                'message' => $error['message'] ?? 'Unknown error',
                'details' => $error['details'] ?? [],
                'raw_data' => $error['raw_data'] ?? [],
            ];
        }, $errors);
    }
}
