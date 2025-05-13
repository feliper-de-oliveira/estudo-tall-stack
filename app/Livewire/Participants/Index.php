<?php

namespace App\Livewire\Participants;

use App\Models\Participant;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 10;

    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];

    public array $headers = [
        ['index' => 'id', 'label' => '#'],
        ['index' => 'name', 'label' => 'Nome'],
        ['index' => 'phone', 'label' => 'Contato'],
        ['index' => 'strenght', 'label' => 'Força'],
        ['index' => 'created_at', 'label' => 'Criado'],
        ['index' => 'action', 'sortable' => false],
    ];

    public function render(): View
    {
        return view('livewire.participants.index');
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Participant::query()
            ->when($this->search !== null, fn (Builder $query) => $query->whereAny(['name', 'strenght'], 'like', '%'.trim($this->search).'%'))
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }
}
