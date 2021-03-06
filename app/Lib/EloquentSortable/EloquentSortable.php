<?php

namespace App\Lib\EloquentSortable;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait EloquentSortable
 * @package App\Lib\EloquentSortable
 */
trait EloquentSortable
{
    /**
     * DetermineOrderColumnName
     * @return string
     */
    protected function determineOrderColumnName(): string
    {
        return $this->sortable['order_column_name'] ?? 'sort';
    }

    /**
     * SetHighestOrderNumber
     * @return void
     */
    public function setHighestOrderNumber(): void
    {
        $orderColumnName = $this->determineOrderColumnName();

        $this->$orderColumnName = $this->getHighestOrderNumber() + 1;
    }

    /**
     * GetHighestOrderNumber
     * @return integer
     */
    public function getHighestOrderNumber(): int
    {
        return (int) $this->buildSortQuery()->max($this->determineOrderColumnName());
    }

    /**
     * ScopeOrdered
     * @param Builder $query     Query.
     * @param string  $direction Direction.
     * @return Builder
     */
    public function scopeOrdered(Builder $query, string $direction = 'asc'): Builder
    {
        return $query->orderBy($this->determineOrderColumnName(), $direction);
    }

    /**
     * BuildSortQuery
     * @return mixed
     */
    public function buildSortQuery()
    {
        return static::query();
    }

    /**
     * Boot
     * @return void
     */
    public static function bootEloquentSortable(): void
    {
        static::creating(
            static function ($model): void {
                if (!$model instanceof Sortable) {
                    return;
                }
                $model->setHighestOrderNumber();
            },
        );
    }
}
