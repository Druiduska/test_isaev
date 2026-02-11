<?php

namespace App\Http\Requests\Api\Product\Category;

use App\Http\Requests\Api\AbstractFormRequest;

/**
 * @OA\Schema(
 *     required={"name"},
 *     schema="SaveCategoryRequest",
 *     @OA\Property(property="name", type="string", description="Наименование категории товаров"),
 *
 *     example={
 *         "name": "Шкуры продажные"
 *     },
 * ),
 */
class SaveCategoryRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:' . config('validation.string.max_length')],
        ];
    }

}
