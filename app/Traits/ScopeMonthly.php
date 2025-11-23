<?php

namespace App\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;

trait ScopeMonthly
{
    #[Scope]
    protected function countMonthly(Builder $query): void
    {
        $alias = $this->getTable();

        $query->selectRaw("count(*) as {$alias}, strftime('%m-%Y', created_at) as month");
    }
}
