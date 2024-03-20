<?php

namespace App\Http\Livewire\Backend;

use App\Models\Broker;
use Illuminate\Database\Eloquent\Builder;
use JamesMills\LaravelTimezone\Facades\Timezone;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class BrokersTable extends DataTableComponent
{
    public $dtCode;
 
    public function mount($dtCode)
    {
        $this->$dtCode = $dtCode;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['brokers.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = Broker::select('*')->with('riskCalculator')->whereHas('user', fn($query) => $query->where('dt_code', $this->dtCode));
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->hideIf(true),
            Column::make("Broker ID", "broker_id")
                ->sortable()
                ->searchable(),
            Column::make("Broker Server", "broker_server")
                ->sortable()
                ->searchable(),
            Column::make("Broker Password", "broker_password")
                ->sortable()
                ->searchable(),
            Column::make("Pairs", "pairs")
                ->sortable()
                ->searchable(),
            Column::make("Risk", "riskCalculator.risk_level")
                ->sortable()
                ->searchable(),
            Column::make("Lot", "lot")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("EA Status", "active")
                ->sortable(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.broker.includes.actions', ['broker' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
