<?php

namespace App\Http\Livewire\Backend;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Spatie\Activitylog\Models\Activity;

class InboxDatabaseTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['activity_log.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = Activity::select('*')->whereIn('log_name', ['member', 'broker'])->latest();
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("Name")
                ->label(fn($row) => $row->causer->name)
                ->sortable()
                ->searchable(),
            Column::make("Log", "description")
                ->sortable()
                ->searchable(),
            Column::make("Date", "created_at")
                ->format(fn($value) => $value->format('j F Y'))
                ->sortable()
                ->searchable(),
        ];
    }
}
