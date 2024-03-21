<?php

namespace App\Http\Livewire\Backend;

use App\Models\PayAccount;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PayAccountsTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['pay_accounts.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = PayAccount::select('*')->with('fromUser:id,dt_code,name')->with('toUser:id,dt_code,name');
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("From", "fromUser.dt_code")
                ->sortable()
                ->searchable(),
            Column::make("To", "toUser.dt_code")
                ->sortable()
                ->searchable(),
            Column::make("Bank", "bank")
                ->sortable()
                ->searchable(),
            Column::make("Bank Account", "bank_account")
                ->sortable()
                ->searchable(),
            Column::make("Bank Account Name", "bank_account_name")
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.payaccount.includes.actions', ['payaccount' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
