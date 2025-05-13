<?php

namespace App\Livewire\Participants;

use App\Livewire\Traits\Alert;
use Livewire\Component;
use App\Models\Participant;
use Livewire\Attributes\Renderless;

class Delete extends Component
{
    use Alert;
    public Participant $participant;
    public function render()
    {
        return <<<'HTML'
        <div>
            <x-button.circle icon="trash" color="red" wire:click="confirm" />
        </div>
        HTML;
    }

    #[Renderless]
    public function confirm(): void
    {
        $this->question('Atenção!', 'Você tem certeza que deseja excluir este participante?')
            ->confirm(method: 'delete')
            ->cancel()
            ->send();
    }

    public function delete(): void
    {
        $this->participant->delete();

        $this->dispatch('deleted');

        $this->success();
    }
}
