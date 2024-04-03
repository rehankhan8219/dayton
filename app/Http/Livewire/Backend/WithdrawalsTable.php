<?php

namespace App\Http\Livewire\Backend;

use App\Models\Withdrawal;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class WithdrawalsTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['withdrawals.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = Withdrawal::select('*')->with('user:id,dt_code,name');
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("DT Code", "user.dt_code")
                ->sortable()
                ->searchable(),
            Column::make("Name", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Bank Name", 'bank_name')
                ->sortable()
                ->searchable(),
            Column::make("Bank Account Number", "bank_account_number")
                ->sortable()
                ->searchable(),
            Column::make("Bank Account Name", "bank_account_name")
                ->sortable()
                ->searchable(),
            Column::make("amonut", "amount")
                ->format(fn($value) => 'IDR '. formatAmount($value))
                ->sortable()
                ->searchable(),
            Column::make("status", "status")
                ->label(fn($row) => '<span class="text-'.$row->status_color.'">'.ucfirst($row->status).'</span>')
                ->sortable()
                ->searchable()
                ->html(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.withdrawal.includes.actions', ['withdrawal' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
