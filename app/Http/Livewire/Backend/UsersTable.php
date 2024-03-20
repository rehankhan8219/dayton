<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use JamesMills\LaravelTimezone\Facades\Timezone;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class UsersTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['users.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = User::select('*')->with('roles', 'twoFactorAuth')->withCount('twoFactorAuth')->whereType(User::TYPE_ADMIN);
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            // Column::make("Type", "type")
            //     ->sortable()
            //     ->searchable()
            //     ->format(fn($type) => ucfirst($type))
            //     ->hideIf(true),
            // Column::make("Name", "name")
            //     ->sortable()
            //     ->searchable()
            //     ->hideIf(true),
            // Column::make("Email", "email")
            //     ->sortable()
            //     ->searchable(),
            // Column::make("Email verified at", "email_verified_at")
            //     ->sortable()
            //     ->searchable()
            //     ->format(fn($emailVerifiedAt) => ($emailVerifiedAt) ? Timezone::convertToLocal($emailVerifiedAt) : 'N/A')
            //     ->collapseOnMobile(),
            // Column::make("Phone", "phone")
            //     ->sortable()
            //     ->searchable()
            //     ->format(fn($phone) => $phone ?? 'N/A')
            //     ->collapseOnMobile(),
            Column::make("User ID", "username")
                ->sortable()
                ->searchable(),
            Column::make("Permissions")
                ->sortable()
                ->searchable()
                ->label(fn($row) => $row->permissions_label)
                ->html()
                ->collapseOnMobile(),
            // BooleanColumn::make("Active", "active")
            //     ->sortable()
            //     ->collapseOnMobile(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.user.includes.actions', ['user' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
