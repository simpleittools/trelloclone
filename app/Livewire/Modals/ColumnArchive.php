<?php

namespace App\Livewire\Modals;

use App\Models\Board;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ColumnArchive extends ModalComponent
{
    public Board $board;

    public function render()
    {
        return view('livewire.modals.column-archive', [
            'columns' => $this->board->columns()->archived()->get()
        ]);
    }
}
