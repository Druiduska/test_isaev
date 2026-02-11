<?php

namespace App\Http\Requests\Api;
use OpenApi\Annotations as OA;

/**
 *  @OA\Parameter(
 *     parameter="IndexRequest:page",
 *     name="page",
 *     in="query",
 *     description="Страница",
 *  ),
 *  @OA\Parameter(
 *     parameter="IndexRequest:per_page",
 *     name="per_page",
 *     in="query",
 *     description="Записей на странице",
 *  ),
 *  @OA\Parameter(
 *     parameter="IndexRequest:q",
 *     name="q",
 *     in="query",
 *     description="Фильтр: ?q[поле]=значение.
 *      Если в качестве поля указать full_text,
 *     то можно осуществлять полнотекстовый поиск по 'значение',
 *     там где он предусмотрен",
 *  ),
 *  @OA\Parameter(
 *     parameter="IndexRequest:sort_field",
 *     name="sort_field",
 *     in="query",
 *     description="Поле сортировки",
 *  ),
 *  @OA\Parameter(
 *     parameter="IndexRequest:sort_direction",
 *     name="sort_direction",
 *     in="query",
 *     description="Сортировка по возростанию (убыванию)",
 *  )
 */
class IndexRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'page' => ['nullable', 'integer', 'min:1'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:' . config('app.per_page_max')],
            'q' => ['nullable', 'array'],
            'sort_field' => ['nullable', 'string', 'max:' . config('validation.string.max_length')],
            'sort_direction' => ['nullable', 'in:0,1'],
        ];

        foreach ($this->filterRules() as $key => $item){
            $rules['filter.' . $key] = $item;
        }

        return $rules;
    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function attributes()
//    {
//        $attributes = [
//            'page' => __('entity.index:page'),
//            'per_page' => __('entity.index:per_page'),
//            'filter' => __('entity.index:filter'),
//            'sort_field' => __('entity.index:sort_field'),
//            'sort_direction' => __('entity.index:sort_direction'),
//        ];
//
//        foreach ($this->filterAttributes() as $key => $item){
//            $attributes['filter.' . $key] = $item;
//        }
//
//        return $attributes;
//    }

    /**
     * Правила для аргументов фильтрации
     *
     * @return array
     */
    protected function filterRules()
    {
        return [];
    }

    /**
     * Описания для аргументов фильтрации
     *
     * @return array
     */
    protected function filterAttributes()
    {
        return [];
    }
}
