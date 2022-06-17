<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Traits\DeleteConfirm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ChartOfAccount;

class Table extends DataTableComponent
{
    use DeleteConfirm;
    protected $model = ChartOfAccount::class;

    public $listeners = ['confirmed' => 'deleted'];

    public function deleted()
    {
        if ($this->model_id){
            ChartOfAccount::find($this->model_id)->delete();
            $this->alert('success', 'Berhasil',[
                'text' => 'Data berhasil disimpan'
            ]);
        }else{
            $this->alert('error', 'Kesalahan',[
                'text' => 'Terjadi kesalahan saat menghapus data'
            ]);
        }
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([10, 25, 50, 100, 500, 1000]);
        $this->setPerPage(500);
    }

    public function columns(): array
    {
        return [
            Column::make('Kunci', 'lock_status')->format(function ($status){
                if ($status == 'locked'){
                    return '<i class="ri-lock-2-fill fw-bolder"></i>';
                }else{
                    return '<i class="ri-lock-unlock-line"></i>';
                }
            })->html(),
            Column::make('Kode Akun', 'code')->sortable(),
            Column::make('Nama Akun', 'name')
                ->format(function ($value){
                    return "<strong>$value</strong>";
                })
                ->html()
                ->searchable()
                ->sortable(),
            Column::make('Kategori', 'category.name')
                ->searchable()
                ->sortable(),
            Column::make('Action', 'id')->format(function ($val){
                return view('partials.action-button', [
                    'edit' => route('chart-of-account.edit', $val),
                    'delete' => $val,
                ]);
            })
        ];
    }
}
