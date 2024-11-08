<?php

use Livewire\Volt\Component;
use App\Models\Group;

new class extends Component {
    public $groups = [];

    public function mount()
    {
        $this->groups = Group::latest()->get();
    }
}; ?>

<div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
    <table class="min-w-full overflow-hidden bg-white border border-gray-200 rounded-lg ">
        <thead class="border-b bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Name
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($groups as $group)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                        {{ $group->name }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                        <button wire:click="manage({{ $group->id }})"
                            class="px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                            Manage
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
