<?php

namespace App\Models;

use App\Models\Traits\Archivable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Column extends Model implements Sortable
{
    use SortableTrait;

    use HasFactory;

    use Archivable;

    protected $guarded = [];

    public function builder(): Builder
    {
        return static::query()->where('board_id', $this->board_id);
    }

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

//    protected $casts = [
//        'archived_at' => 'datetime'
//    ];
//
//    public function scopeNotArchived(Builder $query): void
//    {
//        $query->whereNull('columns.archived_at');
//    }
//
//    public function scopeArchived(Builder $query): void
//    {
//        $query->whereNotNull('columns.archived_at');
//    }


    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
