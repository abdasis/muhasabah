<div>
    {{-- Stop trying to control. --}}
    <form wire:submit.prevent="store">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header border-bottom border-light d-flex align-items-center">
                        <i class="ri-inbox-line me-1"></i>
                        Informasi Produk
                    </h5>
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <x-form-input
                                wire:model.lazy="name"
                                name="name"
                                label="Nama Product"
                                placeholder="Masukan Nama Product"
                            />
                        </div>

                        <div class="form-group mb-3">
                            <x-form-input
                                wire:model.lazy="sku"
                                name="sku"
                                label="Kode/SKU"
                                placeholder="Masukan SKU Product"
                            />
                        </div>

                        <div class="form-group mb-3">
                            <x-form-select
                                name="unit"
                                id="unit"
                                label="Satuan/Unit"
                                wire:model.lazy="unit"
                            >
                                <option value="">Pilih Satuan</option>
                                <option value="pcs">Pcs</option>
                                <option value="kg">Kg</option>
                                <option value="koli">Koli</option>
                            </x-form-select>
                        </div>

                        <div class="form-group mb-3">
                            <x-form-textarea name="description" wire:model.lazy="description" label="Deskripsi Barang"
                                             placeholder="Masukan Deskripsi Barang"/>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header border-light d-flex align-items-center">
                        <div class="form-check form-switch form-switch-md" dir="ltr">
                            <x-form-input name="is_saleable" wire:model.lazy="is_saleable" type="checkbox"
                                          class="form-check-input" id="is-saleable"/>
                            <label class="form-check-label" for="is-saleable">Saya Jual Produk Ini</label>
                        </div>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <x-form-input
                                        wire:model.lazy="sales_price"
                                        name="sales_price"
                                        label="Harga"
                                        placeholder="Masukan Harga"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <x-form-select label="Akun Penjualan" name="sale_account"
                                               wire:model.lazy="sale_account">
                                    <option value="">Pilih Akun</option>
                                    @foreach($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <x-form-input
                                        wire:model.lazy="sales_tax"
                                        name="sales_tax"
                                        label="Pajak"
                                        placeholder="Masukan Pajak"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header border-light d-flex align-items-center">
                        <div class="form-check form-switch form-switch-md" dir="ltr">
                            <x-form-input name="is_purchaseable" wire:model.lazy="is_purchaseable" type="checkbox" class="form-check-input" id="is-purchaseable"/>
                            <label class="form-check-label" for="is-saleable">Saya Beli Produk Ini</label>
                        </div>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <x-form-input
                                        wire:model.lazy="purchase_price"
                                        name="purchase_price"
                                        label="Harga"
                                        placeholder="Masukan Harga"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <x-form-select label="Akun Pembelian" name="purchase_account" wire:model.lazy="purchase_account">
                                    <option value="">Pilih Akun</option>
                                    @foreach($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <x-form-input
                                        wire:model.lazy="purchase_tax"
                                        name="purchase_tax"
                                        label="Pajak"
                                        placeholder="Masukan Pajak"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header border-light d-flex align-items-center">
                        <div class="form-check form-switch form-switch-md" dir="ltr">
                            <x-form-input name="is_monitor" wire:model.lazy="is_monitor" type="checkbox"
                                          class="form-check-input" id="is-saleable"/>
                            <label class="form-check-label" for="is-saleable">Monitor Persediaan Barang</label>
                        </div>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <x-form-input
                                        wire:model.lazy="stock"
                                        name="stock"
                                        label="Stock"
                                        placeholder="0.0"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <x-form-select label="Akun Persediaan Barang" name="monitoring_account"
                                               wire:model.lazy="monitoring_account">
                                    <option value="">Pilih Akun</option>
                                    @foreach($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex gap-2 justify-content-between  my-3">
                    <div class="btn btn-outline-dark btn-border w-md">
                        Batal
                    </div>
                    <button class="btn w-md btn-primary btn-border d-flex align-items-center">
                        <i class="ri-save-line me-1"></i>
                        Simpan
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header border-light d-flex align-items-center">
                        <i class="ri-price-tag-3-fill me-1"></i>
                        Informasi Kategori
                    </h5>
                    <div class="card-body">
                        <div class="form-group mb-3" wire:ignore>
                            <x-form-select
                                name="categories"
                                id="categories"
                                label="Kategori"
                                multiple
                            >
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header border-light d-flex align-items-center">
                        <i class="ri-gallery-line me-1"></i>
                        Gambar Produk
                    </h5>
                    <div class="card-body">
                        @if ($image)
                            <figure class="figure">
                                <img src="{{ $image->temporaryUrl() }}" height="150px" class="figure-img img-fluid rounded" alt="...">
                            </figure>
                        @endif
                        <div class="form-group mb-3">
                            <label for="">Gambar Product</label>
                            <x-form-input wire:model.lazy="image" name="image" class="form-control" type="file"
                                          id="formFile"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

@push('scripts')
    <script>

        $(document).ready(function () {
            $('#categories').select2({
                theme: 'bootstrap-5',
                dropdownCssClass: "select2--small",
                containerCssClass: "select2--small",
                placeholder: 'Pilih Kategori',

            })

            $('#categories').on('change', function () {
                let data = $(this).val();
                @this.set('category_id', data);
            })
        });

        $('#is-saleable').on('change', (event) => {
            @this.
            set('is_saleable', event.target.checked);
        })

        $('#is-monitor').on('change', (event) => {
            @this.
            set('is_monitor', event.target.checked);
        })

        $('#is-purchasable').on('change', (event) => {
            @this.
            set('is_purchaseable', event.target.checked);
        })
    </script>
@endpush
