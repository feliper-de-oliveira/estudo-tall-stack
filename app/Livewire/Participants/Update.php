<?php

namespace App\Livewire\Participants;

use App\Livewire\Traits\Alert;
use App\Models\Participant;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\On;
class Update extends Component
{
    use Alert;

    public ?Participant $participant;

    public bool $modal = false;

    public function render(): View
    {
        return view('livewire.participants.update');
    }

    #[On('load::participant')]
    public function load(Participant $participant): void
    {
        $this->participant = $participant;

        $this->modal = true;
    }

    public function rules(): array
    {
        return [
            'participant.name' => [
                'required',
                'string',
                'max:255'
            ],
            'participant.phone' => [
                'required',
                'string',
            ],
            'participant.strenght' => [
                'required',
                'string',
                'max:255'
            ],
        ];
    }

    public function save(): void
    {
        $this->validate();

        $this->participant->update();

        $this->dispatch('updated');

        $this->resetExcept('participant');

        $this->success();
    }
}
