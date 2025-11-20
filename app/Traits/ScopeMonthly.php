<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait ScopeMonthly
{
    #[Scope]
    protected function countMonthly(Builder $query): void
    {
        $alias = $this->getTable();

        $query->selectRaw("count(*) as {$alias}, strftime('%m-%Y', created_at) as month");
    }
}
