<?php

use Livewire\Volt\Component;
use App\Models\Group;
use Masmerise\Toaster\Toaster;

new class extends Component {
    public $name = '';

    public $description = '';

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Group::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset();

        Toaster::success('Group created!');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Group') }}
        </h2>
    </header>
    <form wire:submit.prevent="submit" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="block w-full mt-1"
                placeholder="Enter name" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input wire:model="description" id="description" name="description" class="block w-full mt-1"
                placeholder="Enter description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>
        </div>
    </form>
</section>
