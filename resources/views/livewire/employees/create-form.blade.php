<?php

use Livewire\Volt\Component;
use App\Models\Employee;
use App\Models\Group;
use Masmerise\Toaster\Toaster;

new class extends Component {
    //
    public $name = '';

    public $phone = '';

    public $group;

    public $groups = [];

    public function mount()
    {
        $this->groups = Group::all();
    }

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

        $this->resetExcept('groups');

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

        <div class="mt-4">
            <x-input-label for="group" :value="__('Group')" />
            <select wire:model="group" id="group" name="group"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>

            <x-input-error class="mt-2" :messages="$errors->get('groups')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>
        </div>
    </form>
</div>
