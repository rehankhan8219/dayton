<?php

namespace App\Http\Livewire\Backend;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class BillSummariesTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
            // ->setAdditionalSelects(['bills.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = Bill::select('user_id', 'status', \DB::raw('sum(amount) as total_bill'))->with('user:id,dt_code,name')->groupBy('user_id')->groupBy('status');
        return $query;
    }

    public function columns(): array
    {
        return [
            // Column::make("Id", "id")
            //     ->sortable(),
            Column::make("DT Code", "user.dt_code")
                ->sortable()
                ->searchable(),
            Column::make("Name", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Unique Code", "user.id")
                ->label(fn($row) => optional($row->user)->unique_code)
                ->sortable()
                ->searchable(),
            Column::make("Total Bill")
                ->label(fn($row) => 'IDR '. $row->total_bill)
                ->sortable()
                ->searchable(),
            Column::make("Bill Charged")
                ->label(fn($row) => 'IDR '. $row->total_bill.'.'.optional($row->user)->unique_code)
                ->sortable()
                ->searchable(),
            Column::make("Status")
                ->label(fn($row) => '<span class="text-'.$row->status_color.'">'.ucfirst($row->status).'</span>')
                ->sortable()
                ->searchable()
                ->html(),
        ];
    }
}
