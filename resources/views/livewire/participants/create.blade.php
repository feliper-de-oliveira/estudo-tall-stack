<div>
    <x-button :text="__('Criar novo participante')" wire:click="$toggle('modal')" sm />

    <x-modal :title="__('Criar novo participante')" wire x-on:open="setTimeout(() => $refs.name.focus(), 250)">
        <form id="participant-create" wire:submit="save" class="space-y-4">
            <div>
                <x-input label="{{ __('Nome') }} *" icon="users" x-ref="name" wire:model="participant.name" required />
            </div>
            <div>
                <x-input label="{{ __('Contato') }} *"  x-mask="99 9999-9999"  icon="phone" x-ref="phone" wire:model="participant.phone" required />
            </div>
            <div>
                <x-input label="{{ __(key: 'Força') }} *" icon="bolt" x-ref="strenght" wire:model="participant.strenght" required />
            </div>

        </form>
        <x-slot:footer>
            <x-button type="submit" form="participant-create">
                @lang('Criar')
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>
