<div class="w-[260px] bg-white self-start shrink-0 rounded-lg shadow-sm max-h-full flex flex-col">
    <div class="flex items-center justify-between">
        <div
            class="h-8 w-full flex items-center px-4 pr-0 min-w-0"
            x-data="{ editing: false }"
            x-on:click.outside="editing = false"
        >
            <button
                class="text-left w-full font-medium"
                x-on:click="editing = true"
                x-show="!editing"
                x-on:column-updated.window="editing = false"
            >
                {{ $column->title }}
            </button>

            <template x-if="editing">
                <form wire:submit="updateColumn" class="-ml-[calc(theme('margin[1.5]')+1px)] grow">
                    <x-text-input
                        value="Column Title"
                        class="h-8 px-1.5 w-full"
                        wire:model="editColumnForm.title"
                    ></x-text-input>
                </form>
            </template>

        </div>
        <div class="px-3.5 py-3">
            <x-dropdown>
                <x-slot name="trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/>
                    </svg>

                </x-slot>
                <x-slot:content>
                    <x-dropdown-button wire:click="archiveColumn">
                        Archive
                    </x-dropdown-button>
                </x-slot:content>
            </x-dropdown>
        </div>
    </div>
    <div
        class="p-3 space-y-1.5 pt-0 overflow-y-scroll"
        wire:sortable-group.item-group="{{ $column->id }}"
    >
        @foreach ( $cards as $card)
            <div
                wire:key="{{ $card->id }}"
                wire:sortable-group.item="{{ $card->id }}"
            >
                <livewire:card :key="$card->id" :card="$card"/>
            </div>

        @endforeach
    </div>

    <div
        class="p-3"
        x-data="{ adding: false }"
        x-on:card-created.window="adding = false"
    >
        <template x-if="adding">
            <form
                wire:submit="createCard"
            >
                <div>
                    <x-input-label for="title" value="Title" class="sr-only"/>
                    <x-text-input id="title" placeholder="Card Title" class="w-full"
                                  wire:model="createCardForm.title" x-init="$el.focus()"/>
                    <x-input-error :messages="$errors->get('createCardForm.title')" class="mt-1"/>
                </div>
                <div class="flex items-center space-x-2 mt-1">
                    <x-primary-button>
                        Create
                    </x-primary-button>
                    <button type="button" class="text-small text-gray-500" x-on:click="adding = false">Cancel
                    </button>
                </div>
            </form>
        </template>
        <button x-show="!adding"
                class="flex items-center space-x-2"
                x-on:click="adding = true"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-5"
            >
                <path d="M12 4.5v15m7.5-7.5h-15" stroke-linejoin="round" stroke-linecap="round"/>
            </svg>
            <span>Add a Card</span>
        </button>
    </div>

</div>
