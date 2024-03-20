<?php

namespace App\Http\Livewire\Backend;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use JamesMills\LaravelTimezone\Facades\Timezone;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class RolesTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['roles.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = Role::select('*')->with('permissions:id,name,description')->withCount('users');
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->hideIf(true),
            Column::make("Type", "type")
                ->sortable()
                ->searchable()
                ->format(fn($type) => ucfirst($type)),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Permissions")
                ->sortable()
                ->searchable()
                ->label(fn($row) => $row->permissions_label)
                ->html()
                ->collapseOnMobile(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.role.includes.actions', ['role' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
