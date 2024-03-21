<?php

namespace App\Http\Livewire\Backend;

use App\Models\HelpCenter;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class HelpCentersTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['help_centers.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = HelpCenter::select('*')->with('helpCategory:id,name');
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Category", "helpCategory.name")
                ->sortable()
                ->searchable(),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Explanation", "explanation")
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(fn($row) => view('backend.helpcenter.includes.actions', ['helpcenter' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
