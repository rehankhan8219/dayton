<?php

namespace App\Http\Livewire\Backend;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class BillsTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['bills.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = Bill::select('*')->with('user:id,dt_code,name')->with('broker:id,broker_id');
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
            Column::make("Due Date", "due_date")
                ->sortable()
                ->searchable(),
            Column::make("DT Code", "user.dt_code")
                ->sortable()
                ->searchable(),
            Column::make("Name", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Broker ID", "broker.broker_id")
                ->sortable()
                ->searchable(),
            Column::make("Bill", "amount")
                ->format(fn($value) => 'IDR '. formatAmount($value))
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.bill.includes.actions', ['bill' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
