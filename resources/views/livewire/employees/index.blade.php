<?php

use Livewire\Volt\Component;
use App\Models\Employee;

new class extends Component {
    public $employees = [];

    public function mount()
    {
        $this->employees = Employee::all();
    }
}; ?>

<div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
    <table class="min-w-full overflow-hidden bg-white border border-gray-200 rounded-lg ">
        <thead class="border-b bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Name
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Phone
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Group
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($employees as $employee)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                        {{ $employee->name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                        {{ $employee->phone }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                        {{ $employee->group->name }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        <button wire:click="manage({{ $employee->id }})"
                            class="px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                            Manage
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
