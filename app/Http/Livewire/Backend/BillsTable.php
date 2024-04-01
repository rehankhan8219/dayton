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
        $query = Bill::select('*')->with('user:id,dt_code,name')->whereNot('status', 'paid');
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
            Column::make("Bill", "amount")
                ->format(fn($value) => 'IDR '. formatAmount($value))
                ->sortable()
                ->searchable(),
            Column::make("Details", "details")
                ->format(fn($value) => \Str::limit($value, 10))
                ->sortable()
                ->searchable()
                ->html(),
            // Column::make("Bill Charged")
            //     ->label(fn($row) => 'IDR '. formatAmount($row->total_bill).'.'.optional($row->user)->unique_code)
            //     ->sortable()
            //     ->searchable(),
            Column::make("Status")
                ->label(fn($row) => '<span class="text-'.$row->status_color.'">'.ucfirst($row->status).'</span>')
                ->sortable()
                ->searchable()
                ->html(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.bill.includes.actions', ['bill' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
