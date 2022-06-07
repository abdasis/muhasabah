<?php

namespace App\Http\Livewire\Contact;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Contact;

class SupplierTable extends DataTableComponent
{
    protected $model = Contact::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make("Nama Panggilan", "nickname")->searchable(),
            Column::make("Perusahaan", 'company_name' )->searchable(),
            Column::make("Handphone")->searchable(),
            Column::make("Email")->searchable(),
            Column::make("Tgl. Dibuat", "created_at")
                ->format(function ($tanggal) {
                    return $tanggal->format('d-m-Y');
                })
                ->sortable(),
            Column::make("Tgl. Diperbarui", "updated_at")
                ->format(function ($tanggal) {
                    return $tanggal->format('d-m-Y');
                })
                ->sortable(),
        ];
    }

    public function builder():Builder
    {
        return Contact::query()->whereHas('contactType', function ($query) {
            $query->where('type', 'Customer');
        });
    }
}
