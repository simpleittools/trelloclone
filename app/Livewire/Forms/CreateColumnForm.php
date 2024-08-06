<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateColumnForm extends Form
{
    #[Validate('required')]
    public string $title = '';
}
