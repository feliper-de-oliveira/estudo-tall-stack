<div>
    <x-modal :title="__('Atualizar Participante: #:id', ['id' => $participant?->id])" wire>
        <form id="participant-update-{{ $participant?->id }}" wire:submit="save" class="space-y-4">
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
            <x-button type="submit" form="participant-update-{{ $participant?->id }}">
                @lang('Save')
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>
