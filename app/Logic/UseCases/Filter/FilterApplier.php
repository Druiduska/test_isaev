<?php

namespace App\Logic\UseCases\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Фильтры для запросов.
 */
class FilterApplier
{
    private const int HAS_SUPPLIER_ORDERS = 1;

    private const int NO_SUPPLIER_ORDERS = 0;

    /**
     * Применяет фильтры к запросу.
     */
    public function __invoke(array $filters, Builder $query, ?array $fields = null): void
    {
        foreach ($filters as $key => $value) {
            if ($value === null || (is_string($value) && trim($value) === '')) {
                continue;
            } elseif (in_array($key, ['id', 'rule_status', 'employee_uuid_1c'])) {
                $this->applyExactFilter($query, $key, $value);
            } elseif (in_array($key, [
                'name'])) {
                // Применяем фильтр по неточному совпадению
                $this->applyLikeFilter($query, $key, $value);
            } elseif ($key === 'full_text' && !is_null($fields)) {
                // Применяем полнотекстовый фильтр
                $this->applyFullTextFilter($query, $value, $fields);
            } elseif ($key === 'created_before_at') {
                // Дата создания ранее $value
                $this->applyLessThanFilter($query, 'created_at', Carbon::createFromTimestamp($value));
            } elseif ($key === 'created_after_at') {
                // Дата создания позже $value
                $this->applyMoreThanFilter($query, 'created_at', Carbon::createFromTimestamp($value));
            }
        }
    }

    /**
     * Фильтр с точным совпадением.
     */
    protected function applyExactFilter(Builder $query, string $key, mixed $value): void
    {
        $query->where($key, $value);
    }

    /**
     * Фильтр значение null.
     */
    protected function applyIsNullFilter(Builder $query, string $key): void
    {
        $query->whereNull($key);
    }


    /**
     * Фильтр с точным совпадением и null.
     */
    protected function applyExactNullFilter(Builder $query, string $key, mixed $value): void
    {
        $query->whereNull($key);
        $query->orWhere($key, $value);
    }

    /**
     * Применяет фильтр для Enum значений.
     */
    protected function applyEnumFilter(Builder $query, $enumClass, mixed $enumName, string $column): void
    {
        $enumValue = $enumClass::{$enumName}->value;

        if ($enumValue !== null) {
            $query->where($column, $enumValue);
        }
    }

    /**
     * Применяет фильтр по наличию связанных записей.
     */
    protected function applyRelationFilter(Builder $query, string $relation, bool $hasRelation): void
    {
        if ($hasRelation) {
            $query->whereHas($relation);
        } else {
            $query->whereDoesntHave($relation);
        }
    }

    /**
     * Применяет фильтр "LIKE" для текстовых полей.
     */
    protected function applyLikeFilter(Builder $query, string $key, mixed $value): void
    {
        $query->where($key, 'like', '%' . $value . '%');
    }

    /**
     * Применяет полнотекстовый фильтр для полей $fields.
     */
    protected function applyFullTextFilter(Builder $query, mixed $value, array $fields): void
    {
        $query->whereFullText($fields, '%' . $value . '%');
    }

    /**
     * Применяет фильтр с проверкой на NULL или сравнением с указанным значением.
     *
     * @param Builder $query Экземпляр запроса
     * @param string $field Название поля для фильтрации
     * @param mixed $value Значение для сравнения (может быть null)
     * @param string $operator Оператор сравнения
     */
    protected function applyNullableComparisonFilter(Builder $query, string $field, mixed $value, string $operator = '<='): void
    {
        $query->where(function ($subQuery) use ($field, $value, $operator) {
            $subQuery->whereNull($field)
                ->orWhere($field, $operator, $value);
        });
    }

    /**
     * Применяет фильтр по месяцу к запросу.
     *
     * Метод преобразует переданный временной штамп в начало и конец месяца,
     * а затем использует эти значения для фильтрации записей в базе данных,
     * где поле, указанное в параметре $key, находится в пределах этого месяца.
     *
     * @param Builder $query Экземпляр построителя запроса для фильтрации
     * @param string $key Имя поля в базе данных, по которому будет применяться фильтр
     * @param int $value Временной штамп, из которого будет извлечен месяц для фильтрации
     *
     * @return void Метод напрямую изменяет экземпляр построителя запроса и не возвращает значение
     */
    protected function applyMonthFilter(Builder $query, string $key, int $value): void
    {
        $date = Carbon::createFromTimestamp($value);
        $startOfMonth = $date->copy()->startOfMonth();
        $endOfMonth = $date->copy()->endOfMonth();
        $query->whereBetween($key, [$startOfMonth, $endOfMonth]);
    }

    /**
     * Значение поля $key менее или равно $value
     *
     * @param Builder $query
     * @param string $key
     * @param mixed $value
     * @return void
     */
    private function applyLessThanFilter(Builder $query, string $key, mixed $value): void
    {
        $query->where($key, '<=', $value);
    }

    /**
     * Значение поля $key более или равно $value
     *
     * @param Builder $query
     * @param string $key
     * @param mixed $value
     * @return void
     */
    private function applyMoreThanFilter(Builder $query, string $key, mixed $value): void
    {
        $query->where($key, '>=', $value);
    }
}
