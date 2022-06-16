<?php

namespace App\Http\Livewire\Product;

use App\Models\ChartOfAccount;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public  $sku, $name, $description, $sales_tax, $purchase_tax, $is_saleable, $sale_account, $sales_price,
            $is_purchaseable ,$purchase_account, $purchase_price, $image, $unit, $stock, $is_monitor, $monitoring_account;

    public $category_id;

    public function rules()
    {
        return[
            'sku' => 'required|unique:products|string',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ];
    }

    public function store()
    {

        $this->validate();

        try {
            DB::beginTransaction();

            //jika ada gambar yang diupload
            if ($this->image){
                //membuat nama file gambar
                $imageName = time()."-".Str::slug($this->name).'.'.$this->image->getClientOriginalExtension();
                $this->image->storeAs('products', $imageName);
            }

            //menyimpan data produk
            $product = Product::create([
                'sku' => $this->sku,
                'name' => $this->name,
                'description' => $this->description,
                'unit' => $this->unit,

                'is_saleable' => $this->is_saleable,
                'sale_account' => $this->sale_account,
                'sales_price' => $this->sales_price,
                'sales_tax' => $this->sales_tax,

                'is_purchaseable' => $this->is_purchaseable,
                'purchase_account' => $this->purchase_account,
                'purchase_price' => $this->purchase_price,
                'purchase_tax' => $this->purchase_tax,

                'stock' => $this->stock,
                'is_monitor' => $this->is_monitor,
                'monitoring_account' => $this->monitoring_account,

                'images' => $imageName ?? null,
            ]);

            //mengambil detail kategori yang dipilih
            $categories = ProductCategory::find($this->category_id);

            /*menyimpan data category product (many to many)*/
            $product->categories()->sync($categories);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data produk berhasil ditambahkan'
            ]);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            $this->alert('error', 'Terjadi Kesalahan', [
                'text' => 'Data produk gagal ditambahkan'
            ]);
            dd($e);
        }

    }

    public function render()
    {
        return view('livewire.product.create',[
            'categories' => ProductCategory::latest()->get(),
            'accounts' => ChartOfAccount::latest()->get(),
        ]);
    }
}
