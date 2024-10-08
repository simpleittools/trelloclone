<?php

namespace App\Models;

use App\Models\Traits\Archivable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Card extends Model implements Sortable
{
    use SortableTrait;

    use HasFactory;

    use Archivable;

    protected $guarded = ['id'];

    public array $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function builder(): Builder
    {
        return static::query()->where('column_id', $this->column_id);
    }


    public function column()
    {
        return $this->belongsTo(Column::class);
    }


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
