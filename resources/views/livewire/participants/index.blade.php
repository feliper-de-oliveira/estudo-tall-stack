<div>
    <div class="mb-2 mt-4">
        <livewire:participants.create @created="$refresh" />
    </div>

    <x-table :$headers :$sort :rows="$this->rows" paginate simple-pagination filter :quantity="[2, 5, 15, 25]">
        @interact('column_created_at', $row)
            {{ $row->created_at->diffForHumans() }}
        @endinteract

        @interact('column_action', $row)
            <div class="flex gap-1">
                <x-button.circle icon="pencil" wire:click="$dispatch('load::participant', { 'participant' : '{{ $row->id }}'})" />
                <livewire:participants.delete :participant="$row" :key="uniqid('', true)" @deleted="$refresh" />
            </div>
        @endinteract
    </x-table>

    <livewire:participants.update @updated="$refresh" />
</div>
