<?php

namespace App\Livewire\Participants;

use App\Livewire\Traits\Alert;
use App\Models\Participant;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    use Alert;

    public Participant $participant;

    public bool $modal = false;

    public function mount(): void
    {
        $this->participant = new Participant();
    }

    public function render(): View
    {
        return view('livewire.participants.create');
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

        $this->participant->save();

        $this->dispatch('created');

        $this->reset();

        $this->participant = new Participant();

        $this->success();
    }
}
