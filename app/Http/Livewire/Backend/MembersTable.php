<?php

namespace App\Http\Livewire\Backend;

use App\Models\User as Member;
use Illuminate\Database\Eloquent\Builder;
use JamesMills\LaravelTimezone\Facades\Timezone;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class MembersTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['users.id as id'])
            ->setTableRowUrl(function($row) {
                return route('admin.member.index', ['dt_code' => $row->dt_code]);
            });
            // ->setTrAttributes(function($row) {
            //     return ['style' => 'cursor:pointer;box-shadow:unset;background-color:blue !important;color:white !important;'];
            // });
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = Member::select('*')->with('roles', 'twoFactorAuth')->withCount('twoFactorAuth')->whereType(Member::TYPE_USER);
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->hideIf(true),
            Column::make("DT Code", "dt_code")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable()
                ->hideIf(true),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Phone", "phone")
                ->sortable()
                ->searchable(),
            Column::make("Country", "country")
                ->sortable()
                ->searchable(),
            Column::make("Password", "password_alt")
                ->sortable()
                ->searchable(),
            Column::make("Upline", "upline")
                ->sortable()
                ->searchable()
                ->format(fn($label) => $label ?? '---'),
            Column::make('Actions')
                ->label(fn($row) => view('backend.member.includes.actions', ['member' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
