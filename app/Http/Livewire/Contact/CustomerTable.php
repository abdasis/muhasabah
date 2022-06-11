<?php

namespace App\Http\Livewire\Contact;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Contact;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class CustomerTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('contact.show', $row);
            });
        $this->defaultSortColumn = 'created_at';
        $this->defaultSortDirection = 'desc';
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Active')
                ->options([
                    '' => 'All',
                    'yes' => 'Yes',
                    'no' => 'No',
                ])->filter(function(Builder $builder, string $value) {
                    if ($value == 'yes'){
                        $builder->get();
                    }else{
                        $builder->onlyTrashed();
                    }
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make("Nama Panggilan", "nickname")->searchable(),
            Column::make("Perusahaan", 'company_name')->searchable()->unclickable(),
            Column::make("Handphone")->searchable()->unclickable(),
            Column::make("Email")->searchable()->unclickable(),
            Column::make("Tgl. Dibuat", "created_at")
                ->format(function ($tanggal) {
                    return $tanggal->format('d-m-Y');
                })->unclickable()
                ->sortable(),
            Column::make("Tgl. Diperbarui", "updated_at")
                ->format(function ($tanggal) {
                    return $tanggal->format('d-m-Y');
                })->unclickable()
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return Contact::query()  ->whereHas('contactType', function ($query) {
            $query->where('type', 'Customer');
        });
    }
}
