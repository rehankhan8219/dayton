<?php

namespace App\Http\Livewire\Backend;

use App\Models\GrowTree;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class GrowTreesTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['grow_trees.id as id']);
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        $query = GrowTree::select('*')->with('user:id,dt_code,name')->with('level:id,name');
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make("DT Code", "user.dt_code")
                ->sortable()
                ->searchable(),
            Column::make("Name", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Level", "level.name")
                ->sortable()
                ->searchable(),
            ImageColumn::make("Diagram", "diagram")
                ->location(fn($row) => asset('storage/'.$row->diagram))
                ->attributes(fn($row) => [
                    'class' => 'img-thumbnail img-responsive',
                    'style' => 'max-width:50px',
                ]),
            Column::make('Actions')
                ->label(fn($row) => view('backend.growtree.includes.actions', ['growtree' => $row]))
                ->html()
                ->collapseOnMobile(),
        ];
    }
}
