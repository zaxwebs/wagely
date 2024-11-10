<?php

use Livewire\Volt\Component;
use App\Models\Employee;

new class extends Component {
    public $employees = [];

    public function mount()
    {
        $this->employees = Employee::latest()->get();
    }
}; ?>

<div class="p-4 bg-white shadow sm:p-8 dark:bg-slate-800 sm:rounded-lg">
	<div class="overflow-hidden border rounded-lg border-slate-200">
		<table class="min-w-full bg-white ">
			<thead class="border-b bg-slate-50">
				<tr>
					<th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">
						Name
					</th>
					<th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">
						Phone
					</th>
					<th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-slate-500">
						Group
					</th>
					<th class="px-6 py-3 text-xs font-medium tracking-wider text-right uppercase text-slate-500">
						Actions
					</th>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-slate-200">
				@foreach ($employees as $employee)
					<tr class="hover:bg-slate-50">
						<td class="px-6 py-4 text-sm text-slate-900 whitespace-nowrap">
							{{ $employee->name }}
						</td>
						<td class="px-6 py-4 text-sm text-slate-900 whitespace-nowrap">
							{{ $employee->phone }}
						</td>
						<td class="px-6 py-4 text-sm text-slate-900 whitespace-nowrap">
							{{ $employee->group->name }}
						</td>
						<td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
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
    
</div>
