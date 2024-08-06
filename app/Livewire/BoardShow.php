<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateColumnForm;
use App\Models\Board;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardShow extends Component
{
    public Board $board;

    public CreateColumnForm $createColumnForm;

    public function mount()
    {
        $this->authorize('show', $this->board);
    }

    public function moved(array $items)
    {
        // iterate over each of the columns
        collect($items)->recursive()->each(function ($column) {
            $columnId = $column->get('value');

            // find all cards that have switched columns and update
            $order = $column->get('items')->pluck('value')->toArray();

            \App\Models\Card::where('user_id', auth()->id())
                ->find($order)
                ->where('column_id', "!=", $columnId)
                ->each->update([
                    'column_id' => $columnId,
                ]);

            \App\Models\Card::setNewOrder($order, 1, 'id', function (Builder $query) {
                $query->where('user_id', auth()->id());
            });


            // get the order of the cards inside the column
        });


    }

    public function createColumn()
    {
        $this->createColumnForm->validate();

        $column = $this->board->columns()->make($this->createColumnForm->only('title'));
        $column->user()->associate(auth()->user());
        $column->save();

        $this->createColumnForm->reset();

        $this->dispatch('columnCreated');
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.board-show', [
            'columns' => $this->board->columns()->ordered()->get(),
        ]);
    }

    public function sorted(array $items)
    {
        $order = collect($items)->pluck('value')->toArray();

        \App\Models\Column::setNewOrder($order, 1, 'id', function (Builder $query) {
            $query->where('user_id', auth()->id());
        });
    }

}
