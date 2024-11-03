<?php

use Livewire\Volt\Component;
use App\Models\Employee;
use Masmerise\Toaster\Toaster;

new class extends Component {
    //
    public $name = '';

    public $phone = '';

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        Employee::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'group_id' => 1,
        ]);

        $this->reset();

        Toaster::success('Employee created!');
    }
}; ?>

<div>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Employee') }}
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
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input wire:model="phone" id="phone" name="phone" class="block w-full mt-1"
                placeholder="Enter phone" required />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>
        </div>
    </form>
</div>
