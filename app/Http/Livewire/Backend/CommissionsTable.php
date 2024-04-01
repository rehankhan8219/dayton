<?php

namespace App\Http\Livewire\Backend;

use App\Models\Commission;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class CommissionsTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['commissions.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = Commission::select('*')->with('user:id,dt_code,name');
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Period")
                ->label(fn($row) => $row->period)
                ->sortable()
                ->searchable(),
            Column::make("DT Code", "user.dt_code")
                ->sortable()
                ->searchable(),
            Column::make("Name", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Comm. Level", "level")
                ->sortable()
                ->searchable(),
            Column::make("Commission", "amount")
                ->format(fn($value) => 'IDR '. formatAmount($value))
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.commission.includes.actions', ['commission' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
