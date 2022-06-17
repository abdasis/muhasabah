<?php

namespace App\Http\Livewire\Product;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class Table extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function (Product $product) {
                return route('products.show', $product);
            });
    }

    public $columnSearch = [
        'name' => null,
        'sku' => null,
    ];

    public function filters(): array
    {
        return [
            SelectFilter::make('E-mail Verified', 'email_verified_at')
                ->setFilterPillTitle('Verified')
                ->options([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'yes') {
                        $builder->whereNotNull('email_verified_at');
                    } elseif ($value === 'no') {
                        $builder->whereNull('email_verified_at');
                    }
                }),
            SelectFilter::make('Active')
                ->setFilterPillTitle('User Status')
                ->setFilterPillValues([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ])
                ->options([
                    '' => 'All',
                    '1' => 'Yes',
                    '0' => 'No',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('active', true);
                    } elseif ($value === '0') {
                        $builder->where('active', false);
                    }
                }),
            DateFilter::make('Verified From')
                ->config([
                    'min' => '2020-01-01',
                    'max' => '2021-12-31',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('email_verified_at', '>=', $value);
                }),
            DateFilter::make('Verified To')
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('email_verified_at', '<=', $value);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('SKU', 'sku')
                ->sortable(),
            Column::make('Nama Produk', 'name')
                ->format(function ($value){
                    return "<strong>$value</strong>";
                })
                ->html()
                ->sortable(),
            Column::make('Kategori', 'id')->format(function ($id, $product, $table) {
                return $product->categories->pluck('name')->implode(', ');
            })->sortable()
                ->unclickable(),
            Column::make('Harga Jual', 'sales_price')
                ->sortable()
                ->unclickable()
                ->format(fn($price) => rupiah($price)),
            Column::make('Harga Beli', 'purchase_price')
                ->sortable()
                ->unclickable()
                ->format(fn($price) => rupiah($price)),
        ];
    }

    public function builder(): Builder
    {
        return Product::with('categories');
    }
}
