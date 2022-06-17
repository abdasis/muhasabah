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

class Edit extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $sku, $name, $description, $sales_tax, $purchase_tax, $is_saleable, $sale_account, $unit, $sales_price,
        $is_purchaseable, $purchase_account, $purchase_price, $stock, $is_monitor, $monitoring_account, $image;

    public $category_id;

    public $product;
    public function mount(Product $product)
    {
        $this->product = $product;
        $this->sku = $product->sku;
        $this->name = $product->name;
        $this->unit = $product->unit;
        $this->description = $product->description;
        $this->sales_tax = $product->sales_tax;
        $this->purchase_tax = $product->purchase_tax;
        $this->is_saleable = $product->is_saleable;
        $this->sale_account = $product->sale_account;
        $this->sales_price = $product->sales_price;
        $this->is_purchaseable = $product->is_purchaseable;
        $this->purchase_account = $product->purchase_account;
        $this->purchase_price = $product->purchase_price;
        $this->stock = $product->stock;
        $this->is_monitor = $product->is_monitor;
        $this->image = $product->image;
        $this->category_id = $product->categories->pluck('id')->toArray();
    }

    public function rules()
    {

        return [
            'sku' => 'required|string|unique:products,sku,'.$this->product->id,
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
            if ($this->image) {
                //membuat nama file gambar
                $imageName = time() . "-" . Str::slug($this->name) . '.' . $this->image->getClientOriginalExtension();
                $this->image->storeAs('products', $imageName);
            }

            //menyimpan data produk
            $product = Product::where('id', $this->product->id)->update([
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

            $product = $this->product;

            //mengambil detail kategori yang dipilih
            $categories = ProductCategory::find($this->category_id);

            /*menyimpan data category product (many to many)*/
            $product->categories()->sync($categories);

            $this->alert('success', 'Berhasil', [
                'text' => 'Data produk berhasil ditambahkan'
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error', 'Terjadi Kesalahan', [
                'text' => 'Data produk gagal ditambahkan'
            ]);
            dd($e);
        }

    }

    public function render()
    {
        return view('livewire.product.edit', [
            'categories' => ProductCategory::latest()->get(),
            'accounts' => ChartOfAccount::latest()->get(),
        ]);
    }
}
