<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Archivable
{
    public function initializeArchivable()
    {
        $this->mergeCasts([
            'archived_at' => 'datetime'
        ]);
    }

    public function scopeNotArchived(Builder $query): void
    {
        $query->whereNull($this->getTable() . '.archived_at');
    }

    public function scopeArchived(Builder $query): void
    {
        $query->whereNotNull($this->getTable() . '.archived_at');
    }

    public function scopeLatestArchived(Builder $query): void
    {
        $query->orderby('archived_at', 'desc');
    }

}
