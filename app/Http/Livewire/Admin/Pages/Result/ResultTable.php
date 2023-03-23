<?php

namespace App\Http\Livewire\Admin\Pages\Result;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Result;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;

class ResultTable extends LivewireDatatable
{
    public function builder(): Builder
    {
        return Result::query();
    }

    public function columns(): array
    {
        return [
            Column::index($this),

            DateColumn::name('created_at')
                ->label('Tanggal'),

            Column::name('periode')
                ->label('Periode'),

            // Column::name('result_time')
            //     ->label('Result Time'),

            Column::name('first')
                ->label('1ST PRIZE'),

            Column::name('second')
                ->label('2ND PRIZE'),

            Column::name('third')
                ->label('3RD PRIZE'),

            Column::callback(['id', 'created_at'], function ($id) {
                return <<<EOT
                    <div class="flex flex-col items-start space-y-2">
                        <button
                            class="px-4 py-1 text-sm text-white bg-blue-700 rounded hover:bg-blue-500"
                            x-data
                            x-on:click="\$dispatch('open-edit-dialog', $id)"
                        >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <button
                            class="px-4 py-1 text-sm text-white bg-red-700 rounded hover:bg-red-500"
                            x-data
                            x-on:click="\$dispatch('open-delete-dialog', $id)"
                        >
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
EOT;
            }),
        ];
    }
}
