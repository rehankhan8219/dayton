<?php

namespace App\Http\Livewire\Backend;

use App\Models\RiskCalculator;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class RiskCalculatorsTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['risk_calculators.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = RiskCalculator::select('*');
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Pairs", "pairs")
                ->sortable()
                ->searchable(),
            Column::make("Risk Level", "risk_level")
                ->sortable()
                ->searchable(),
            Column::make("Lot", "lot")
                ->sortable()
                ->searchable(),
            Column::make("Balance", "balance")
                ->format(fn($amount) => 'IDR '. formatAmount($amount))
                ->sortable()
                ->searchable(),
            Column::make("Explanation", "explanation")
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.riskcalculator.includes.actions', ['riskCalculator' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
